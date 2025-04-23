<?php

namespace Pfrug\ValidateDocumentUy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool isValid(string $document)
 * @method static int controlDigit(string $document)
 * @method static string generateRandomDocument()
 *
 * @see \Pfrug\ValidateDocumentUy\Services\UruguayanCiValidator
 */
class ValidateDocumentUy extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'document-uy';
    }
}
