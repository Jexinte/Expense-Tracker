<?php declare(strict_types=1);

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
    public const EXPENSE_TRACKER_LABEL = Color::GREEN."expense-tracker ";
    public const WELCOME = "Welcome to ExpenseTracker CLI! \n

We're thrilled to help you take control of your finances. With ExpenseTracker, you can easily create, read, update, and delete your expenses—all from the comfort of your command line.\n

Below is the list of available commands \n\n";

  
}