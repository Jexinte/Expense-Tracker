<?php

declare(strict_types=1);

/**
 * PHP version 8.
 *
 * @category Command
 * @package  SummaryByMonthCommand
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

namespace Command;

use Config\JsonFile;
use DateTime;
use Exception;
use Enumeration\Message;

class SummaryByMonthCommand
{
    public string $month = "";

    /**
     * Summary of __construct
     * @param JsonFile $jsonFile
     */
    public function __construct(private JsonFile $jsonFile)
    {

    }

    /**
     * Summary of months
     * @param int $monthToFind
     * @return bool|int|string
     */
    public function months(int $monthToFind): bool|int|string
    {
        $months = [
            1 => "01",
            2 => "02",
            3 => "03",
            4 => "04",
            5 => "05",
            6 => "06",
            7 => "07",
            8 => "08",
            9 => "09",
            10 => "10",
            11 => "11",
            12 => "12"
        ];
        return array_search($monthToFind, array_flip($months), true);
    }

    /**
     * Summary of getTheRightMonth
     * @param string $userInput
     * @return void
     */
    public function getTheRightMonth(string $userInput): void
    {
        $lastSpacePos = strrpos($userInput, " ") + 1;
        $monthFromUserInput = substr($userInput, $lastSpacePos);
        $this->month =  "-".strval($this->months(intval($monthFromUserInput)))."-";
    }

    /**
     * Summary of getExpensesByMonth
     * @throws \Exception
     * @return void
     */
    public function getExpensesByMonth(): void
    {
        $expenses = $this->jsonFile->content();
        $amountExpensesByMonth = [];
        foreach($expenses as $expense) {
            if(str_contains($expense["date"], $this->month)) {
                $amountExpensesByMonth[] = $expense["amount"];
            }
        }

        $this->chooseWhatToDoDependingOnTheRightMonthOrNot($amountExpensesByMonth);

    }

    /**
     * Summary of chooseWhatToDoDependingOnTheRightMonthOrNot
     * @param array $amountExpensesByMonth
     * @throws \Exception
     * @return void
     */
    public function chooseWhatToDoDependingOnTheRightMonthOrNot(array $amountExpensesByMonth): void
    {
        switch(true) {
            case $this->month === "--":
                throw new Exception(Message::EXPENSE_TRACKER_LABEL.Message::MONTH_DOESNT_EXIST);
            case empty($amountExpensesByMonth):
                throw new Exception(Message::EXPENSE_TRACKER_LABEL.Message::NO_EXPENSES_FOUND);
            default:
                $stdOut = fopen('php://stdout', 'w');
                $monthInNumber = str_replace('-', '', $this->month);
                fwrite($stdOut, Message::SUMMARY_OF_ALL_EXPENSES.$this->returnTheMonthInWord($monthInNumber).": $".array_sum($amountExpensesByMonth)."\n\n");
                fclose($stdOut);
        }
    }

    /**
     * Summary of returnTheMonthInWord
     * @param string $monthInNumber
     * @return string
     */
    public function returnTheMonthInWord(string $monthInNumber): string
    {
        $date = DateTime::createFromFormat('!m', $monthInNumber);
        return $date->format('F');
    }

}
