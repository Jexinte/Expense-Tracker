<?php



use Entity\Expense;
use Config\JsonFile;
use Enumeration\FilePath;
use PHPUnit\Framework\TestCase;

/**
 * PHP version 8.
 *
 * @category tests/units
 * @package  ExpenseTest
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/Expense-Tracker
 */



class ExpenseTest extends TestCase
{
    private Expense $expense;
    private JsonFile $jsonFile;

    /**
     * Summary of setUp
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->jsonFile = new JsonFile();
        if(empty($this->jsonFile->content())) {
            $this->expense = new Expense(1, date('Y-m-d'), "Lunch", 20, $this->jsonFile);
        } else {
            $this->expense = new Expense(count($this->jsonFile->content()) + 1, date('Y-m-d'), "Lunch", 20, $this->jsonFile);
        }
    }


    /**
     * Summary of testShouldReturnTheSameId
     *
     * @return void
     */
    public function testShouldReturnTheSameId(): void
    {
        $this->assertSame(1, $this->expense->getId());
    }
    /**
     * Summary of testShouldReturnTheSameDate
     *
     * @return void
     */
    public function testShouldReturnTheSameDate(): void
    {
        $this->assertSame(date('Y-m-d'), $this->expense->getDate());
    }



    /**
     * Summary of testShouldReturnTheSameDescription
     *
     * @return void
     */
    public function testShouldReturnTheSameDescription(): void
    {
        $this->assertSame('Lunch', $this->expense->getDescription());
    }

    /**
     * Summary of testShouldReturnTheSameFileName
     *
     * @return void
     */
    public function testShouldReturnTheSameFileName(): void
    {
        $this->assertFileExists(FilePath::EXPENSE);
    }

}
