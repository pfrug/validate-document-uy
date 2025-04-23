<?php

namespace Pfrug\ValidateDocumentUy\Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Pfrug\ValidateDocumentUy\Rules\ValidUruguayanCiRule;
use Pfrug\ValidateDocumentUy\Tests\TestCase;

class RuleValidationTest extends TestCase
{
    /** @test */
    public function it_passes_with_a_valid_ci()
    {
        $data = ['ci' => self::VALID_DOCUMENT];

        $rules = ['ci' => [new ValidUruguayanCiRule()]];

        $validator = Validator::make($data, $rules);

        $this->assertTrue($validator->passes());
    }

    /** @test */
    public function it_fails_with_an_invalid_ci()
    {
        $data = ['ci' => self::INVALID_DOCUMENT];

        $rules = ['ci' => [new ValidUruguayanCiRule()]];

        $validator = Validator::make($data, $rules);

        $this->assertFalse($validator->passes());
        $this->assertArrayHasKey('ci', $validator->errors()->messages());
    }

    /** @test */
    public function it_fails_with_a_garbage_string()
    {
        $data = ['ci' => 'asdf-ñ@'];

        $rules = ['ci' => [new ValidUruguayanCiRule()]];

        $validator = Validator::make($data, $rules);

        $this->assertFalse($validator->passes());
    }
}
