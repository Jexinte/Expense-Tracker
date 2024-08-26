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
    public const ADD_DESCRIPTION = "--description";
    public const ADD_AMOUNT = "--amount";
    public const LIST_ALL = "list";
    public const SUMMARY_OF_ALL = "summary";
    public const DELETE = "delete --id";
    public const UPDATE = "update --id";
    public const SUMMARY_BY_MONTH = "summary --month";
}
