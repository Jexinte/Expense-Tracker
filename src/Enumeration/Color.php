<?php 

declare(strict_types=1);

/**
 * PHP version 8.
 *
 * @category Enumeration
 * @package  Color
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

namespace Enumeration;

enum Color: string
{
    public const GREEN = "\033[32m";
    public const YELLOW = "\033[33m";
    public const GREY = "\033[90m";
    public const RED = "\e[0;31m";

}
