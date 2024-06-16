<?php

require_once '../../vendor/autoload.php';
require_once '../../src/Service/BaseService.php';
require_once '../../src/Service/ErrorService.php';
require_once '../../src/Service/NetworkService.php';
require_once '../../src/Service/SSPService.php';

use Src\Service\BaseService;
use Src\Service\NetworkService;
use Src\Service\PhoneBookService;
use Src\Service\SSPService;

// Erreur et leurs dépendances
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.UTF-8');

ErrorService::initialize();

if (isset($_GET['draw'])) {
    try {
        $pdo = NetworkService::getDb();
        $pdo->exec('set names utf8');

        $table = 'phone_book';
        // Table's primary key
        $primaryKey = 'id';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'last_name', 'dt' => 1 ),
            array( 'db' => 'phone_number', 'dt' => 2 ),
        );

        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
         * If you just want to use the basic configuration for DataTables with PHP
         * server-side, there is no need to edit below this line.
         */
        $sql_details = array(
            'pdo' => $pdo
        );

        $results = SSPService::simple( $_GET, $sql_details, $table, $primaryKey, $columns );

        echo json_encode($results, JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        $errorMessage = $e->getMessage();
        trigger_error($errorMessage, E_USER_ERROR);
        echo json_encode(['success' => false, 'message' => $errorMessage]);
    }
}
// Vérifier si la requête est une requête POST
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'PUT' || $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $phoneBookService = new PhoneBookService();
    try {
        if (isset($_SERVER['CONTENT_TYPE']) && str_contains($_SERVER['CONTENT_TYPE'], 'json')) {
            $rawData = file_get_contents("php://input");
            $datas = json_decode($rawData, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($datas['search'])) {
                    if ($datas['search']) {
                        if (empty($datas['last_name']) && empty($datas['phone_number'])) {
                            throw new Exception('Veuillez saisir une information pour la recherche.');
                        }

                        $function = 'getBySearchTerms';
                        if (!method_exists($phoneBookService, $function)) {
                            throw new Exception("La fonction $function n'existe pas.");
                        }

                        unset($datas['search']);
                        $results = $phoneBookService->getBySearchTerms($datas);
                        echo json_encode($results, JSON_UNESCAPED_UNICODE);
                    } else {
                        json_encode(['success' => false, 'message' => 'La requête de recherche n\'est pas complète.']);
                    }
                }

                /** CRÉATION */
                if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($datas['add'])) {
                    if ($datas['add']) {
                        $newDatas = [
                            'last_name' => BaseService::sanitize_input($datas['last_name']),
                            'phone_number' => BaseService::sanitize_input($datas['phone_number'])
                        ];

                        $result = $phoneBookService->createData($newDatas);
                        if (!$result) {
                            throw new Exception('La création n\'a pas pû être effectuée.');
                        }
                        echo json_encode(['success' => true, 'message' => 'La création du nouveau numéro a bien été effectuée.', 'id' => $result]);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'La requête de création n\'est pas complète']);
                    }
                }

                /** ÉDITION */
                if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($datas['update'])) {
                    if ($datas['update']) {
                        $newDatas = [
                            'last_name' => BaseService::sanitize_input($datas['last_name']),
                            'phone_number' => BaseService::sanitize_input($datas['phone_number']),
                            'id' => filter_var($datas['id'], FILTER_SANITIZE_NUMBER_INT),
                        ];
                        if (!$phoneBookService->updateData($newDatas)) {
                            throw new Exception('La mise à jour n\'a pas été effectuée.');
                        }
                        echo json_encode(['success' => true, 'message' => 'La mise à jour a bien été effectués.']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'La requête de modification n\'est pas complète']);
                    }
                }

                /** SUPPRESSION */
                if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($datas['delete'])) {
                    if ($datas['delete']) {
                        if (!$phoneBookService->deleteData($datas['id'])) {
                            throw new Exception('La suppression du numéro de téléphone n\'a pas pu être effectuée.');
                        }
                        echo json_encode(['success' => true, 'message' => 'La suppression du numéro à bien été effectuée.']);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'La requête de suppression n\'est pas complète']);
                    }
                }

            } else {
                echo json_encode(['success' => false, 'message' => 'Les données ne sont pas dans un format JSON valide.']);
            }

        } else {
            echo json_encode(['success' => false, 'message' => 'Les données envoyées ne correspondent pas aux formats attendues.']);
        }

    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

} else {
    echo json_encode(['success' => false, 'message' => 'La requête demandé n\'a pas pû aboutir.']);
}