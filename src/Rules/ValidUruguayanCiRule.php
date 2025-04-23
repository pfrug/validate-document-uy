<?php

namespace Pfrug\ValidateDocumentUy\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Pfrug\ValidateDocumentUy\Support\ValidatesUruguayanCi;

class ValidUruguayanCiRule implements ValidationRule
{
    use ValidatesUruguayanCi;

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->isUruguayanCiValid($value)) {
            $fail(__('validate-document-uy::validation.validate_ci', ['attribute' => $attribute]));
        }
    }
}