<?php

declare(strict_types=1);

/**
 * PHP version 8.
 *
 * @category Enumeration
 * @package  FilePath
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

namespace Enumeration;

enum FilePath: string
{
    public const EXPENSE = __DIR__."../../../config/expense.json";
}
