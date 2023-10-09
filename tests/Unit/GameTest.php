<?php

namespace App\Tests\Unit;

use App\Services\DictionaryService;
use App\Util\PalindromeUtils;
use ErrorException;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{

    /**
     * @throws ErrorException
     */
    public function testUniqueLetterScoring()
    {
        $this->assertEquals('Points: 4', (new DictionaryService())->checkIfWordExists("hello"));
    }

    /**
     * @throws ErrorException
     */
    public function testPalindromeScoring()
    {
        $this->assertEquals('Points: 7', (new DictionaryService())->checkIfWordExists("deified"));
    }

    /**
     * @throws ErrorException
     */
    public function testAlmostPalindromeScoring()
    {
        $this->assertEquals('Points: 6', (new DictionaryService())->checkIfWordExists("engage"));
    }

    public function testIsStringPalindrome()
    {
        $this->assertTrue((new PalindromeUtils())->isPalindrome("deified"));
    }

    public function testIsStringAlmostPalindrome()
    {
        $this->assertTrue((new PalindromeUtils())->isAlmostPalindrome("engage"));
    }

}