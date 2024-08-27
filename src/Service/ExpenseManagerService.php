<?php

declare(strict_types=1);

use Entity\Expense;
use Config\JsonFile;
use Enumeration\Color;
use Enumeration\Regex;
use Command\AddCommand;
use Enumeration\Message;
use Service\ExpenseCrudService;
use Command\SummaryByMonthCommand;

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

    public function __construct(private AddCommand $addCommand, private SummaryByMonthCommand $summaryMonthByCommand, private ExpenseCrudService $expenseCrudService)
    {
    }


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

    /**
     * Summary of startTheProgram
     * @return void
     */
    public function startTheProgram(): void
    {
        $this->welcomeMessage();
        $stdOut = fopen('php://stdout', 'w');

        while(!$this->userHaventExitTheProgram) {
            try {
                fwrite($stdOut, Message::EXPENSE_TRACKER_LABEL.Color::YELLOW);
                $userInput = fopen('php://stdin', 'r');

                $this->detectWhichCommandHavenBeenType(trim(fgets($userInput)));
            } catch(Exception $e) {
                $stdErr = fopen('php://stderr', 'w');
                fwrite($stdErr, $e->getMessage());
                fclose($stdErr);
            }

        }
    }

    /**
     * Summary of detectWhichCommandHavenBeenType
     * @param string $userInput
     * @return void
     */
    public function detectWhichCommandHavenBeenType(string $userInput): void
    {
        switch(true) {
            case preg_match(Regex::ADD_COMMAND, $userInput):
                $this->expenseCrudService->create($this->addCommand->returnCleanValues($userInput));
                break;
            case preg_match(Regex::LIST_COMMAND, $userInput):
                $this->expenseCrudService->findAll();
                break;
            case preg_match(Regex::SUMMARY_COMMAND, $userInput):
                $this->expenseCrudService->findBy();
                break;
            case preg_match(Regex::SUMMARY_BY_MONTH_COMMAND, $userInput):
                $this->summaryMonthByCommand->getTheRightMonth($userInput);
                $this->summaryMonthByCommand->getExpensesByMonth();
                break;
        }


    }
}

try {
    $jsonFile = new JsonFile();

    $addCommand = new AddCommand();
    $summaryByMonthCommand = new SummaryByMonthCommand($jsonFile);
    $expenseCrudService = new ExpenseCrudService($jsonFile);
    $expenseManagerService = new ExpenseManagerService($addCommand, $summaryByMonthCommand, $expenseCrudService);
    $expenseManagerService->startTheProgram();
} catch(Exception $e) {
    $stdErr = fopen('php://stderr', 'w');
    fwrite($stdErr, $e->getMessage());
    fclose($stdErr);
}
