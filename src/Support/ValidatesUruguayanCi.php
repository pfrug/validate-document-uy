<?php
namespace Pfrug\ValidateDocumentUy\Support;

use Pfrug\ValidateDocumentUy\Facades\ValidateDocumentUy;

trait ValidatesUruguayanCi
{
    public function isUruguayanCiValid(string $value): bool
    {
        return ValidateDocumentUy::isValid($value);
    }
}
