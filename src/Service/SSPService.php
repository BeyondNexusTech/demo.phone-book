<?php

namespace Src\Service;

class SSPService {
    /**
     * Create the data output array for the DataTables rows
     * @param array $columns Column information array
     * @param array $data    Data from the SQL get
     * @return array          Formatted data in a row based format
     */
    static function data_output($columns, $data): array
    {
        $out = array();

        for ($i = 0, $ien = count($data); $i < $ien; $i++) {
            $row = array();

            for ($j = 0, $jen = count($columns); $j < $jen; $j++) {
                $column = $columns[$j];
                if (isset($column['formatter'])) {
                    $row[$column['dt']] = $column['formatter']($data[$i][$column['db']], $data[$i]);
                } else {
                    $row[$column['dt']] = $data[$i][$column['db']];
                }
            }

            $out[] = $row;
        }

        return $out;
    }

    /**
     * Execute an SQL query on the database
     * @param \PDO $db Database handler
     * @param array|string $bindings Array of PDO binding values from bind() to be
     *   used for safely escaping strings. Note that this can be given as the
     *   `bindings` parameter in the main query function and it will be passed
     *   through to here, rather than used in the query string.
     * @param string|null $sql SQL query to execute.
     * @return array           Result from the query (all rows)
     */
    static function sql_exec(\PDO $db, $bindings, $sql = null): array
    {
        // Argument shifting
        if ($sql === null) {
            $sql = $bindings;
        }

        $stmt = $db->prepare($sql);
        if (is_array($bindings)) {
            for ($i = 0, $ien = count($bindings); $i < $ien; $i++) {
                $binding = $bindings[$i];
                $stmt->bindValue($binding['key'], $binding['val'], $binding['type']);
            }
        }

        // Execute
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_BOTH);
    }

    /**
     * Perform the SQL queries needed for an server-side processing requested
     * @param array $request Data sent to server by DataTables
     * @param array $sql_details SQL connection details - see sql_connect()
     * @param string $table SQL table to query
     * @param string $primaryKey Primary key of the table
     * @param array $columns Column information array
     * @return array          Server-side processing response array
     */
    static function simple($request, $sql_details, $table, $primaryKey, $columns): array
    {
        $bindings = array();
        $db = $sql_details['pdo'];

        // Build the SQL query string from the request
        $limit = self::limit($request, $columns);
        $order = self::order($request, $columns);
        $where = self::filter($request, $columns, $bindings);

        // Main query to actually get the data
        $data = self::sql_exec($db, $bindings,
            "SELECT `" . implode("`, `", self::pluck($columns, 'db')) . "`
             FROM `$table`
             $where
             $order
             $limit"
        );

        // Data set length after filtering
        $resFilterLength = self::sql_exec($db,"SELECT FOUND_ROWS()");
        $recordsFiltered = $resFilterLength[0][0];

        // Total data set length
        $resTotalLength = self::sql_exec($db,"SELECT COUNT(`$primaryKey`) FROM `$table`");
        $recordsTotal = $resTotalLength[0][0];

        // Output
        return array(
            "draw"            => isset($request['draw']) ? intval($request['draw']) : 0,
            "recordsTotal"    => intval($recordsFiltered),
            "recordsFiltered" => intval($recordsTotal),
            "data"            => self::data_output($columns, $data)
        );
    }

    /**
     * Paging
     * @param   array $request Data sent to server by DataTables
     * @param   array $columns Column information array
     * @return  string SQL limit clause
     */
    static function limit($request, $columns): string
    {
        $limit = '';

        if (isset($request['start']) && $request['length'] != -1) {
            $limit = "LIMIT " . intval($request['start']) . ", " . intval($request['length']);
        }

        return $limit;
    }

    /**
     * Ordering
     * @param   array $request Data sent to server by DataTables
     * @param   array $columns Column information array
     * @return  string SQL order by clause
     */
    static function order($request, $columns): string
    {
        $order = '';
        if (isset($request['order']) && count($request['order'])) {
            $orderBy = array();
            $dtColumns = self::pluck($columns, 'dt');

            for ($i = 0, $ien = count($request['order']); $i < $ien; $i++) {
                $columnIdx = intval($request['order'][$i]['column']);
                $requestColumn = $request['columns'][$columnIdx];
                $columnIdx = array_search($requestColumn['data'], $dtColumns);
                $column = $columns[$columnIdx];

                if ($requestColumn['orderable'] == 'true') {
                    $dir = $request['order'][$i]['dir'] === 'asc' ? 'ASC' : 'DESC';
                    $orderBy[] = "`" . $column['db'] . "` " . $dir;
                }
            }

            $order = 'ORDER BY ' . implode(', ', $orderBy);
        }
        return $order;
    }

    /**
     * Searching / Filtering
     * @param array $request Data sent to server by DataTables
     * @param array $columns Column information array
     * @param array $bindings Array of PDO binding values from bind() to be
     *   used for safely escaping strings. Note that this can be given as the
     *   `bindings` parameter in the main query function and it will be passed
     *   through to here, rather than used in the query string.
     * @return string SQL where clause
     */
    static function filter($request, $columns, &$bindings): string
    {
        $globalSearch = array();
        $columnSearch = array();
        $dtColumns = self::pluck($columns, 'dt');

        if (isset($request['search']) && $request['search']['value'] != '') {
            $str = $request['search']['value'];

            for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
                $requestColumn = $request['columns'][$i];
                $columnIdx = array_search($requestColumn['data'], $dtColumns);
                $column = $columns[$columnIdx];

                if ($requestColumn['searchable'] == 'true') {
                    if(!empty($column['db'])) {
                        $binding = self::bind($bindings, '%' . strtolower($str) . '%', \PDO::PARAM_STR);
                        $globalSearch[] = "LOWER(`" . $column['db'] . "`) LIKE " . $binding;
                    }
                }
            }
        }

        // Individual column filtering
        for ($i = 0, $ien = count($request['columns']); $i < $ien; $i++) {
            $requestColumn = $request['columns'][$i];
            $columnIdx = array_search($requestColumn['data'], $dtColumns);
            $column = $columns[$columnIdx];

            $str = $requestColumn['search']['value'];

            if ($requestColumn['searchable'] == 'true' && $str != '') {
                $binding = self::bind($bindings, '%' . strtolower($str) . '%', \PDO::PARAM_STR);
                $columnSearch[] = "LOWER(`" . $column['db'] . "`) LIKE " . $binding;
            }
        }

        // Combine the filters into a single string
        $where = '';
        if (count($globalSearch)) {
            $where = '(' . implode(' OR ', $globalSearch) . ')';
        }

        if (count($columnSearch)) {
            $where = $where === '' ? implode(' AND ', $columnSearch) : $where . ' AND ' . implode(' AND ', $columnSearch);
        }

        if ($where !== '') {
            $where = 'WHERE ' . $where;
        }

        return $where;
    }

    /**
     * Perform the SQL bindings for a value
     * @param array &$a    Array of bindings
     * @param mixed $val  Value to bind
     * @param int $type PDO field type
     * @return string       Bound key to be used in the SQL where clause
     */
    static function bind(&$a, $val, $type): string
    {
        $key = ':binding_' . count($a);

        $a[] = array(
            'key' => $key,
            'val' => $val,
            'type' => $type
        );

        return $key;
    }

    /**
     * Pull a particular property from each assoc. array in a numeric array,
     * returning an array of the property values from each item.
     *  @param array $a    Array to get data from
     *  @param string $prop Property to read
     *  @return array        Array of property values
     */
    static function pluck($a, $prop): array
    {
        $out = array();

        for ($i = 0, $len = count($a); $i < $len; $i++) {
            $out[] = $a[$i][$prop];
        }

        return $out;
    }
}