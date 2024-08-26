<?php


declare(strict_types=1);

namespace Entity;

use Config\JsonFile;

/**
 * PHP version 8.
 *
 * @category Entity
 * @package  Expense
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */


class Expense
{
    /**
     * Summary of __construct
     *
     * @param int $id
     * @param string $date
     * @param string $description
     * @param int $amount
     * @param JsonFile $jsonFile
     */
    public function __construct(private int $id, private string $date, private string $description, private int $amount, private JsonFile $jsonFile)
    {
        if(!$this->jsonFile->isCreated()) {
            $this->jsonFile->create();
        }

    }

    /**
     * Summary of getId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Summary of getDate
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }



    /**
     * Summary of getDescription
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Summary of getAmount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }
}
