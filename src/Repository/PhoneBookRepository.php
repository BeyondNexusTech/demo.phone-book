<?php

namespace Src\Repository;

use PDO;
use Src\Entity\PhoneBook;
use Src\Service\NetworkService;


class PhoneBookRepository
{
    private NetworkService $networkService;
    public function __construct()
    {
        $this->networkService = new NetworkService();
    }

    /**
     * Get all data in table Phone Book
     * @return  array
     */
    public function gets(): array
    {
        return $this->networkService->getDb()->query("SELECT * FROM phone_book")->fetchAll(PDO::FETCH_CLASS, PhoneBook::class);
    }

    /**
     * Get the data row in table Phone Book by the id
     * @param   int $id
     * @return  array
     */
    public function get(int $id):array
    {
        $req = $this->networkService->getDb()->prepare("SELECT * FROM phone_book WHERE id = ?");
        $req->execute([$id]);
        return $req->fetchAll(PDO::FETCH_CLASS, PhoneBook::class);
    }

    /**
     * @param   string $phoneNumber
     * @return  array
     */
    public function getByPhoneNumber(string $phoneNumber): array
    {
        $req = $this->networkService->getDb()->prepare("SELECT * FROM phone_book WHERE phone_number LIKE ?");
        $req->execute(['%' . $phoneNumber . '%']);
        return $req->fetchAll(PDO::FETCH_CLASS, PhoneBook::class);
    }

    /**
     * @param   string $lastName
     * @return  array
     */
    public function getByLastName(string $lastName): array
    {
        $req = $this->networkService->getDb()->prepare("SELECT * FROM phone_book WHERE last_name LIKE ?");
        $req->execute(['%' . $lastName . '%']);
        return $req->fetchAll(PDO::FETCH_CLASS, PhoneBook::class);
    }

    /**
     * Get the data row in table Phone Book by the phone number value
     * @param   array $data
     * @return  array
     */
    public function getByDatas(array $data): array
    {
        // Building the SQL query dynamically based on provided parameters
        $sql = "SELECT * FROM phone_book WHERE 1=1";
        $params = [];

        if (!empty($data['last_name'])) {
            $sql .= " AND last_name like ?";
            $params[] = '%' . $data['last_name'] . '%';
        }

        if (!empty($data['phone_number'])) {
            $sql .= " AND phone_number like ?";
            $params[] = '%' . $data['phone_number'] . '%';
        }

        $req = $this->networkService->getDb()->prepare($sql);
        $req->execute($params);

        // Fetch a single result
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Add new data on Phone Book table with the array of data and return the last insert id
     * @param   array $datas ['Last_Name', 'Phone_Number']
     * @return  int
     */
    public function create(array $datas): int
    {
        $req = $this->networkService->getDb()->prepare("
               INSERT INTO phone_book(last_name, phone_number)
                VALUES (:last_name, :phone_number)
        ");
        $req->bindValue('last_name', $datas['last_name'], PDO::PARAM_STR);
        $req->bindValue('phone_number', $datas['phone_number'], PDO::PARAM_STR);
        $req->execute();
        return $this->networkService->getDb()->lastInsertId();
    }

    /**
     * Update the phone number and the name
     * @param   array $datas ['Last_Name', 'Phone_Number', 'ID']
     * @return  bool
     */
    public function update(array $datas): bool
    {
        $req = $this->networkService->getDb()->prepare("UPDATE phone_book SET last_name = :last_name, phone_number = :phone_number WHERE id = :id");
        $req->bindValue('last_name', $datas['last_name'], PDO::PARAM_STR);
        $req->bindValue('phone_number', $datas['phone_number'], PDO::PARAM_STR);
        $req->bindValue('id', $datas['id'], PDO::PARAM_INT);
        $req->execute();
        return $req->rowCount() > 0;
    }

    /**
     * Delete the phone number with this ID
     * @param   int $id
     * @return  bool
     */
    public function delete(int $id): bool
    {
        $req = $this->networkService->getDb()->prepare("DELETE FROM phone_book WHERE id = :id");
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->rowCount() > 0;
    }
}