<?php

declare(strict_types=1);

use Enumeration\Color;
use Enumeration\Message;
use Enumeration\ExpenseCommand;

/**
 * PHP version 8.
 *
 * @category Service
 * @package  ExpenseManagerService
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */


require_once __DIR__ . "../../../vendor/autoload.php";

class ExpenseManagerService
{
    public bool $userHaventExitTheProgram = false;


    /**
     * Summary of welcomeMessage
     *
     * @return void
     */
    public function welcomeMessage(): void
    {
        $stdOut = fopen('php://stdout', 'w');
        fwrite($stdOut, Color::YELLOW.Message::WELCOME);
        fwrite($stdOut, Message::LISTS_OF_ALL_COMMANDS_AVAILABLE);
        fclose($stdOut);
    }
}

$expenseManagerService = new ExpenseManagerService();
