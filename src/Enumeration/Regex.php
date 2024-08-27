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
    public const NOT_NUMBERS = '/[^\d+]/';
    public const ADD_COMMAND = '/(^add[\s]{1}--description[\s]{1}\"[^\"]+\"[\s]{1}--amount \d+)/';
    public const LIST_COMMAND = '/^list$/';
    public const SUMMARY_COMMAND = '/^summary$/';
    public const SUMMARY_BY_MONTH_COMMAND = '/(^summary[\s]{1}--month[\s]{1}\d{1,2})/';
}
