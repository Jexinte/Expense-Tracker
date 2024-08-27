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

use Enumeration\Regex;

class AddCommand
{

    /**
     * Summary of returnCleanValues
     * @param string $userInput
     * @return array<string>
     */
    public function returnCleanValues(string $userInput): array
    {
        return [$this->getTheExpenseDescription($userInput),$this->getTheExpenseAmount($userInput)];
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
