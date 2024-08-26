<?php

declare(strict_types=1);

namespace Enumeration;

/**
 * PHP version 8.
 *
 * @category Enumeration
 * @package  Regex
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

enum Regex: string
{
    public const LETTERS_NUMBERS_AND_SPACES = '/^"[a-zA-z\d\s]+"$/';
    public const ONLY_NUMBERS = '/\d+/';
}
