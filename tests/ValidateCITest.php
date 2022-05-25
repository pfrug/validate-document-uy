<?php

namespace Frugone\ValidateDocumentUy\Tests;

use PHPUnit\Framework\TestCase;
use Frugone\ValidateDocumentUy\ValidateCI;

class ValidateCITest extends TestCase
{

    /**
     * @test
     */
    public function validDocumentTest()
    {
        $this->assertTrue(ValidateCI::isValid('12345672'));
    }

    /**
     * @test
     */
    public function invalidDocumentTest()
    {
        $this->assertFalse(ValidateCI::isValid('12345678'));
    }

    /**
     * @test
     */
    public function caractersTest()
    {
        $this->assertTrue(ValidateCI::isValid('1.234.567-2'));
        $this->assertTrue(ValidateCI::isValid(' __1.23 -- 4. test 567  . 2'));
    }

    /**
     * @test
     */
    public function controlDigitTest()
    {
        for ($i = 0; $i < 10; $i++) {
            $document = ValidateCI::gerRandomDocument();
            $this->assertTrue(ValidateCI::controlDigit($document) == substr($document, -1));
        }
    }

    /**
     * @test
     */
    public function lessThanMillionTest()
    {
        $this->assertTrue(ValidateCI::isValid('1234561'));
    }

    /**
     * @test
     */
    public function randonDocumentTest()
    {
        for ($i = 0; $i < 10; $i++) {
            $document = ValidateCI::gerRandomDocument();
            $this->assertTrue(ValidateCI::isValid($document));
        }
    }
}
