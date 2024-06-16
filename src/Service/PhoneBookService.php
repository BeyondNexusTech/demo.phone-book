<?php

namespace Src\Service;

use Src\Repository\PhoneBookRepository;


class PhoneBookService extends PhoneBookRepository
{
    /**
     * @return  array
     */
    public function getsPhoneBook(): array
    {
        return $this->gets();
    }

    /**
     * @param   string $data
     * @return  array
     */
    public function getByPhone(string $data): array
    {
        return $this->getByPhoneNumber($data);
    }

    /**
     * @param   string $data
     * @return  array
     */
    public function getByName(string $data): array
    {
        return $this->getByLastName($data);
    }

    /**
     * @param   array $data
     * @return  array
     */
    public function getBySearchTerms(array $data): array
    {
        return $this->getByDatas($data);
    }

    /**
     * @param   array $datas
     * @return  int
     */
    public function createData(array $datas): int
    {
        return $this->create($datas);
    }

    /**
     * @param   array $datas
     * @return  bool
     */
    public function updateData(array $datas): bool
    {
        return $this->update($datas);
    }

    /**
     * @param   int $id
     * @return  bool
     */
    public function deleteData(int $id): bool
    {
        return $this->delete($id);
    }
}