<?php

declare(strict_types=1);

/**
 * PHP version 8.
 *
 * @category config
 * @package  JsonFile
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

namespace Config;

use Enumeration\FolderPath;
use Enumeration\FilePath;

class JsonFile
{
    /**
     * Summary of expenses
     * @var array<string>
     */
    public ?array $expenses;
    /**
     * Summary of isCreated
     *
     * @return bool
     */
    public function isCreated(): ?bool
    {
        $files = scandir(FolderPath::CONFIG);
        $filename = basename(FilePath::EXPENSE, "expense.json");
        return in_array($filename, $files);

    }

    /**
     * Summary of create
     */
    public function create(): void
    {
        if(!$this->isCreated()) {
            $file = fopen(FilePath::EXPENSE, "w");
            fclose($file);
        }

    }

    /**
     * Summary of content
     *
     * @return array<null|string>
     */
    public function content(): ?array
    {
        switch(true) {
            case file_exists(FilePath::EXPENSE) && is_null(json_decode(file_get_contents(FilePath::EXPENSE), true)):
                $this->expenses = [];
                break;

            default:
                $this->expenses = json_decode(file_get_contents(FilePath::EXPENSE), true);
                break;
        }
        return  $this->expenses;

    }

}