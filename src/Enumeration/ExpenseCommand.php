<?php

declare(strict_types=1);

/**
 * PHP version 8.
 *
 * @category Enumeration
 * @package  ExpenseCommand
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

namespace Enumeration;

enum ExpenseCommand
{
    public const ADD = "add";
    public const DESCRIPTION = "--description";
    public const AMOUNT = "--amount";
    public const MONTH = "--month";
    public const LIST_ALL = "list";
    public const SUMMARY_OF_ALL = "summary";
    public const DELETE = "delete --id";
    public const SUMMARY_BY_MONTH = "summary --month";

    public const ALL_COMMANDS_TO_SHOW = [self::ADD,self::DESCRIPTION,self::AMOUNT,self::LIST_ALL,self::SUMMARY_OF_ALL,self::DELETE,self::SUMMARY_BY_MONTH];
}
