<?php

declare(strict_types=1);

namespace Service;

use Entity\Expense;
use Config\JsonFile;
use Enumeration\Message;
use Enumeration\FilePath;

/**
 * PHP version 8.
 *
 * @category Service
 * @package  ExpenseCrudService
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

/**
 * Summary of ExpenseCrud
 */
interface ExpenseCrud
{
    public function create(string $descriptionAndAmountValues): void;
}
class ExpenseCrudService
{
    /**
     * Summary of __construct
     * @param JsonFile $jsonFile
     */
    public function __construct(private JsonFile $jsonFile)
    {
    }

    /**
     * Summary of create
     * @param mixed $descriptionAndAmountValues
     * @return void
     */
    public function create($descriptionAndAmountValues): void
    {

        $expense = null;
        $originalDataArray = $this->jsonFile->content();
        switch(true) {
            case empty($originalDataArray):
                echo "tableau vide ";
                $expense = new Expense(1, date('Y-m-d'), current($descriptionAndAmountValues), intval(next($descriptionAndAmountValues)), $this->jsonFile);
                break;
            default:
                $idForExpense = count($originalDataArray) == 0 ? 1 : count($originalDataArray) + 1;
                $expense = new Expense($idForExpense, date('Y-m-d'), str_replace('"', "", current($descriptionAndAmountValues)), intval(next($descriptionAndAmountValues)), $this->jsonFile);
                break;
        }

        $array["id"] = $expense->getId();
        $array["date"] = $expense->getDate();
        $array["description"] = $expense->getDescription();
        $array["amount"] = $expense->getAmount();
        array_push($originalDataArray, $array);
        $json = json_encode($originalDataArray);

        file_put_contents(FilePath::EXPENSE, $json);
        $stdOut = fopen('php://stdout', 'w');
        fwrite($stdOut, Message::EXPENSE_ADDED_SUCCESSFULLY."( ID :".$expense->getId().")\n\n");
        fclose($stdOut);
    }
}
