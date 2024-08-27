<?php

/**
 * PHP version 8.
 *
 * @category tests/Unit
 * @package  JsonFileTest
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */

use Config\JsonFile;
use Enumeration\FilePath;
use PHPUnit\Framework\TestCase;

class JsonFileTest extends TestCase
{
    private JsonFile $jsonFile;

    /**
     * Summary of setUp
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->jsonFile = new JsonFile();
    }



    /**
     * Summary of testShouldReturnFalseIfFileNotCreated
     */
    public function testShouldReturnFalseIfFileNotCreated(): void
    {
        if(file_exists(FilePath::EXPENSE)) {
            unlink(FilePath::EXPENSE);
        }
        $this->assertSame(false, $this->jsonFile->isCreated());
    }

    /**
     * Summary of testShouldReturnTrueIfFileIsCreated
     */
    public function testShouldReturnTrueIfFileIsCreated(): void
    {
        $this->jsonFile->create();
        $this->assertSame(true, $this->jsonFile->isCreated());
    }

    /**
     * Summary of testShouldReturnAJsonFile
     */
    public function testShouldReturnAJsonFile(): void
    {
        $this->jsonFile->create();
        $this->assertFileExists(FilePath::EXPENSE);
    }

    /**
     * Summary of testShouldReturnAnEmptyArrayWhenFileDoesntExist
     */
    public function testShouldReturnAnEmptyArrayWhenFileDoesntExist(): void
    {
        if(file_exists(FilePath::EXPENSE)) {
            unlink(FilePath::EXPENSE);
        }
        $this->assertSame([], $this->jsonFile->content());
    }


}
