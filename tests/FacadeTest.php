<?php

namespace Pfrug\ValidateDocumentUy\Tests;

use Pfrug\ValidateDocumentUy\Facades\ValidateCI;

class FacadeTest extends TestCase
{
    /** @test */
    public function canAccessFacadeTest()
    {
        $this->assertTrue(ValidateCI::isValid(TestCase::VALID_DOCUMENT));
    }
}