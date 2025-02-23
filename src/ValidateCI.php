<?php

namespace Pfrug\ValidateDocumentUy;

/**
 *
 * Class to validate Uruguayan identity document
 *
 * @author P.Frugone - frugone@gmail.com
 *
 */
class ValidateCI
{
    /**
     * Check if the document is valid
     * @param String $document
     * @return Boolean
     */
    public function isValid($document): bool
    {
        $document = $this->cleanDocument($document);
        if (strlen($document) >  8 || strlen($document) <  7) {
            return false;
        }

        $ci = $this->parseDocument($document);

        $controlDigit = $this->getControlDigit($ci['document']);
        return ($controlDigit == $ci['controlDigit']);
    }

    /**
     * Obtains the validation digit for de document
     * @param String $document
     * @return Int
     */
    public function controlDigit($document)
    {
        $document = $this->cleanDocument($document);
        if (strlen($document) >  7 || strlen($document) <  6) {
            throw new \Exception('Invalid document', 1);
        }

        return $this->getControlDigit($document);
    }

    /**
     * Generate random document
     * @return string
     */
    public function gerRandomDocument(): string
    {
        $number = (string) rand(100000, 9999999);
        return $number . $this->getControlDigit($number);
    }

    /**
     * Obtains the validation digit for de document
     * @param String $document
     * @return Int
     */
    protected function getControlDigit(string $document): int
    {
        // add 0 for cedulas less than a million
        $document = str_pad($document, 7, '0', STR_PAD_LEFT);

        $code = [ 2, 9, 8, 7, 6, 3, 4 ];
        $sum = 0 ;
        foreach ($code as $key => $digit) {
            $sum += ($digit * $document[$key]);  // //$sum += ($digit * $document[$key]) % 10 ;
        }
        $h = ( $sum % 10 == 0 ) ? 0 : 10 - $sum % 10;

        return $h;
    }

    /**
     * Separate the document in number and control digit, add the necessary zeros for documents less than a million
     * @param String $document
     * @return Array ['controlDigit', 'document']
     */
    protected function parseDocument($document): array
    {
        return [
                'document' => substr($document, 0, -1),
                'controlDigit' => substr($document, -1)
            ];
    }

    /**
     * Remove all non-numeric characters from a value
     * @param String $n
     * @return String
     */
    protected function cleanDocument($n): string
    {
        return preg_replace('/[^0-9]+/', '', $n);
        //return preg_replace( '/\D/', '', $n );
    }
}
