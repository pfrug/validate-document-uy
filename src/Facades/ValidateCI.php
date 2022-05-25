<?php

namespace Frugone\ValidateDocumentUy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool isValid(string $document)
 * @method static string controlDigit(string $document)
 * @method static string gerRandomDocument()
 *
 * @see Frugone\ValidateDocumentUy\ValidateCI
 */
class ValidateCI extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'validate_ci';
    }
}
