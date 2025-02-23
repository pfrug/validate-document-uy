<?php

namespace Pfrug\ValidateDocumentUy\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Pfrug\ValidateDocumentUy\Facades\ValidateCI;

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
            $fail(__('validate-document-uy::validation.document_uy', ['attribute' => $attribute]));
        }
    }
}
