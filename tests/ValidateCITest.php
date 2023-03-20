<?php

namespace Pfrug\ValidateDocumentUy\Tests;

use Pfrug\ValidateDocumentUy\Facades\ValidateCI;

class ValidateCITest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->implementations['di-container'] = $this->app[ValidateCI::class];
        $this->implementations[ValidateCI::class] = new ValidateCI();
    }

    /**
     * @test
     * @covers ::isValid
     */
    public function validDocumentTest()
    {
        $this->assertTrue(ValidateCI::isValid(TestCase::VALID_DOCUMENT));
    }

    /**
     * @test
     * @covers ::isValid
     */
    public function invalidDocumentTest()
    {
        $this->assertFalse(ValidateCI::isValid(TestCase::INVALID_DOCUMENT));
    }

    /**
     * @test
     * @covers ::isValid
     */
    public function emptyDocumentTest()
    {
        $this->assertFalse(ValidateCI::isValid(''));
        $this->assertFalse(ValidateCI::isValid(null));
    }

    /**
     * @covers ::isValid
     */
    public function shortDocumentTest()
    {
        $this->assertFalse(ValidateCI::isValid('123'));
    }

    /**
     * @test
     * @covers ::isValid
     */
    public function caractersTest()
    {
        $this->assertTrue(ValidateCI::isValid('1.234.567-2'));
        $this->assertTrue(ValidateCI::isValid(' __1.23 -- 4. test 567  . 2'));
        $this->assertFalse(ValidateCI::isValid('Hello World!'));
    }

    /**
     * @test
     * @covers ::controlDigit
     */
    public function controlDigitTest()
    {
        for ($i = 0; $i < 100; $i++) {
            $document = ValidateCI::gerRandomDocument();
            $number = substr($document, 0, -1);
            $this->assertTrue(ValidateCI::controlDigit($number) == substr($document, -1));
        }
    }

    /**
     * @test
     * @covers ::isValid
     */
    public function lessThanMillionTest()
    {
        $this->assertTrue(ValidateCI::isValid('1234561'));
    }

    /**
     * @test
     * @covers ::controlDigit
     */
    public function gerRandomDocument()
    {
        for ($i = 0; $i < 100; $i++) {
            $document = ValidateCI::gerRandomDocument();
            $this->assertTrue(ValidateCI::isValid($document));
        }
    }
}
