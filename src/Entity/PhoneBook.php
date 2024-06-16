<?php

namespace Src\Entity;

/**
 * Entité de l'annuaire
 */
class PhoneBook
{
    /**
     * @var     int
     */
    protected int $id;

    /**
     * @var     string
     */
    protected string $last_name;

    /**
     * @var     string
     */
    protected string $phone_number;

    /**
     * @return  int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param   int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return  string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param   string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return  string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * @param   string $phone_number
     */
    public function setPhoneNumber(string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }
}