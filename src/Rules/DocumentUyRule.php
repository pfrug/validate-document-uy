<?php

namespace App\Rules;

use App\Facades\ValidateCI;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DocumentUyRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!ValidateCI::isValid($value)) {
            $fail('The :attribute must be a valid Uruguayan identity document.');
        }
    }
}
