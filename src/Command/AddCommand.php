<?php

declare(strict_types=1);

/**
 * PHP version 8.
 *
 * @category Command
 * @package  AddCommand
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

namespace Command;

use Exception;
use Enumeration\Regex;
use Enumeration\Message;

class AddCommand
{
    /**
     * Summary of checkerForValues
     * @param string $userInput
     * @throws \Exception
     * @return  array<int,array<string, int>|string|null>
     */
    public function checkerForValues(string $userInput): array
    {
        if(preg_match(Regex::ADD_COMMAND, $userInput)) {
            $this->getTheExpenseAmount($userInput);
            return [$this->getTheExpenseDescription($userInput),$this->getTheExpenseAmount($userInput)];
        }

        throw new Exception(Message::EXPENSE_TRACKER_LABEL.Message::WRONG_COMMAND);
    }

    /**
     * Summary of getTheExpenseDescription
     * @param string $userInput
     * @return string
     */
    public function getTheExpenseDescription(string $userInput): string
    {
        $posOfFirstDoubleQuotes = strpos($userInput, '"');
        $posOfLastDoublesQuotes = strrpos($userInput, '"');
        $cleanString = str_replace('"', "", substr($userInput, $posOfFirstDoubleQuotes, $posOfLastDoublesQuotes - strlen($userInput)));
        return $cleanString;
    }

    /**
     * Summary of getTheExpenseAmount
     * @param string $userInput
     * @return array<string,int>|string|null
     */
    public function getTheExpenseAmount(string $userInput): array|string|null
    {
        $posOfLastDash = strrpos($userInput, '-');
        return preg_replace(REGEX::NOT_NUMBERS, '', substr($userInput, $posOfLastDash + 1));
    }
}
