<?php


declare(strict_types=1);

namespace Enumeration;

use Enumeration\Color;

/**
 * PHP version 8.
 *
 * @category Enumeration
 * @package  Message
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

enum Message: string
{
    public const EXPENSE_TRACKER_LABEL = Color::GREEN." expense-tracker ";
    public const WELCOME = "\n\n Welcome to ExpenseTracker CLI! \n\n We're thrilled to help you take control of your finances. \n\n With ExpenseTracker, you can easily create, read, update, and delete your expenses—all from the comfort of your command line.\n\n\n Below is the list of available commands : \n\n\n";

    public const ADD_COMMAND_EXAMPLE = self::EXPENSE_TRACKER_LABEL.Color::YELLOW.'add --description "Lunch" --amount 20'.PHP_EOL.PHP_EOL;
    public const EXPENSE_ADDED_SUCCESSFULLY_EXAMPLE = Color::GREY." # Expense added successfully ( ID: 1)\n\n";
    public const ADD_COMMAND_EXAMPLE_2 = self::EXPENSE_TRACKER_LABEL.Color::YELLOW.'add --description "Dinner" --amount 10'.PHP_EOL.PHP_EOL;
    public const EXPENSE_ADDED_SUCCESSFULLY_EXAMPLE_2 = Color::GREY." # Expense added successfully ( ID: 2)\n\n";

    public const EXPENSES_LIST_EXAMPLE = self::EXPENSE_TRACKER_LABEL.Color::YELLOW."list".Color::GREY." \n\n # ID  Date           Description Amount\n\n # 1  2024-08-06      Lunch       $20\n\n # 2  2024-08-06      Dinner      $10\n\n";

    public const EXPENSES_SUMMARY_EXAMPLE = self::EXPENSE_TRACKER_LABEL.COLOR::YELLOW."summary\n\n".Color::GREY." # Total expenses : $30\n\n";
    public const DELETE_COMMAND_EXAMPLE = self::EXPENSE_TRACKER_LABEL.COLOR::YELLOW."delete --id 1\n\n".Color::GREY." # Expense deleted successfully\n\n";
    public const EXPENSES_SUMMARY_EXAMPLE_2 = self::EXPENSE_TRACKER_LABEL.COLOR::YELLOW."summary\n\n".Color::GREY." # Total expenses : $20\n\n";
    public const EXPENSES_SUMMARY_BY_MONTH = self::EXPENSE_TRACKER_LABEL.COLOR::YELLOW."summary --month 8\n\n".Color::GREY." # Total expenses for August: $20\n\n";
    public const WRONG_COMMAND = Color::RED."Please, type a valid command !\n";
    public const EXPENSE_ADDED_SUCCESSFULLY = Color::GREY."\n # Expense added successfully ";
    public const LIST_HEADLINES = " \n\n # ID     Date           Description    Amount\n\n";
    public const NO_EXPENSES_FOUND = Color::RED."No expenses found ! Add some of it !\n";
    public const MONTH_DOESNT_FOUND = Color::RED."No expenses found for this month !\n";
    public const MONTH_DOESNT_EXIST = Color::RED."Specify a valid month between 1 and 12 to get the summary expenses related to !\n";
    public const TAG_SYMBOL = " #";
    public const ONE_SPACE = "  ";
    public const TWO_SPACE = "  ";
    public const FIVE_SPACE = "           ";
    public const TEN_SPACE = "        ";
    public const SUMMARY_OF_ALL_EXPENSES = Color::GREY."\n # Total expenses for ";
    public const SUMMARY_OF_ALL_EXPENSES_END = Color::GREY.": $";
    public const EXPENSE_DELETE_SUCCESSFULLY = Color::GREY." # Expense deleted successfully\n\n";

    public const LISTS_OF_ALL_COMMANDS_AVAILABLE = self::ADD_COMMAND_EXAMPLE.self::EXPENSE_ADDED_SUCCESSFULLY_EXAMPLE.self::ADD_COMMAND_EXAMPLE_2.self::EXPENSE_ADDED_SUCCESSFULLY_EXAMPLE_2.self::EXPENSES_LIST_EXAMPLE.self::EXPENSES_SUMMARY_EXAMPLE.self::DELETE_COMMAND_EXAMPLE.self::EXPENSES_SUMMARY_EXAMPLE_2.self::EXPENSES_SUMMARY_BY_MONTH;
}
