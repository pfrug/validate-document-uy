<?php

namespace Pfrug\ValidateDocumentUy\Tests\Unit;

use Pfrug\ValidateDocumentUy\Facades\ValidateDocumentUy;
use Pfrug\ValidateDocumentUy\Tests\TestCase;

class ValidateDocumentTest extends TestCase
{
    /** @test */
    public function it_validates_a_valid_document()
    {
        $this->assertTrue(ValidateDocumentUy::isValid(self::VALID_DOCUMENT));
    }

    /** @test */
    public function it_rejects_an_invalid_document()
    {
        $this->assertFalse(ValidateDocumentUy::isValid(self::INVALID_DOCUMENT));
    }

    /** @test */
    public function it_rejects_empty_document()
    {
        $this->assertFalse(ValidateDocumentUy::isValid(''));
        $this->assertFalse(ValidateDocumentUy::isValid(null));
    }

    /** @test */
    public function it_rejects_short_document()
    {
        $this->assertFalse(ValidateDocumentUy::isValid('123'));
    }

    /** @test */
    public function it_handles_documents_with_special_characters()
    {
        $this->assertTrue(ValidateDocumentUy::isValid('1.234.567-2'));
        $this->assertTrue(ValidateDocumentUy::isValid(' __1.23 -- 4. test 567  . 2'));
        $this->assertFalse(ValidateDocumentUy::isValid('Hello World!'));
    }

    /** @test */
    public function it_generates_valid_documents()
    {
        for ($i = 0; $i < 100; $i++) {
            $doc = ValidateDocumentUy::generateRandomDocument();
            $this->assertTrue(ValidateDocumentUy::isValid($doc));
        }
    }

    /** @test */
    public function it_computes_control_digits_correctly()
    {
        for ($i = 0; $i < 100; $i++) {
            $doc = ValidateDocumentUy::generateRandomDocument();
            $number = substr($doc, 0, -1);
            $expected = substr($doc, -1);
            $this->assertEquals($expected, ValidateDocumentUy::calculateCheckDigit($number));
        }
    }

    /** @test */
    public function it_validates_documents_less_than_million()
    {
        $this->assertTrue(ValidateDocumentUy::isValid('1234561'));
    }
}
