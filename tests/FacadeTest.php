<?php

namespace Frugone\ValidateDocumentUy\Tests;

use Frugone\ValidateDocumentUy\Facades\ValidateCI;

class FacadeTest extends TestCase
{
    /** @test */
    public function canAccessFacadeTest()
    {
        $this->assertTrue(ValidateCI::isValid(TestCase::VALID_DOCUMENT));
    }
}