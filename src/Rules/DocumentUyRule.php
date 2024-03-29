<?php

namespace Pfrug\ValidateDocumentUy\Rules;

use Illuminate\Contracts\Validation\Rule;
use Pfrug\ValidateDocumentUy\Facades\ValidateCI;

class DocumentUyRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ValidateCI::isValid($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validate-document-uy::validation.documentUy');
    }
}
