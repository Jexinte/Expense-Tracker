<?php

declare(strict_types=1);

/**
 * PHP version 8.
 *
 * @category Command
 * @package  ListCommand
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

namespace Command;

use Exception;
use Enumeration\Regex;
use Enumeration\Message;

class ListCommand
{
   
    /**
     * Summary of checkerForValues
     * @param string $userInput
     * @throws \Exception
     * @return bool
     */
    public function checkerForValues(string $userInput):bool
    {
        if(preg_match(Regex::LIST_COMMAND, $userInput)) {
            return true;
        }
        throw new Exception(Message::EXPENSE_TRACKER_LABEL.Message::WRONG_COMMAND);
    }
}