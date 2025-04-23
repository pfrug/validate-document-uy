<?php

namespace Pfrug\ValidateDocumentUy\Services;

class UruguayanCiValidator
{
    /**
     * Checks if the document is valid.
     *
     * @param string $document
     * @return bool
     */
    public function isValid(string $document): bool
    {
        $document = $this->sanitize($document);

        if (strlen($document) < 7 || strlen($document) > 8) {
            return false;
        }

        $ci = $this->split($document);
        $checkDigit = $this->calculateCheckDigit($ci['number']);

        return (int) $ci['check'] === $checkDigit;
    }

    /**
     * Calculates the check digit for a given document number.
     *
     * @param string $document
     * @return int
     */
    public function calculateCheckDigit(string $document): int
    {
        $document = str_pad($this->sanitize($document), 7, '0', STR_PAD_LEFT);

        $multipliers = [2, 9, 8, 7, 6, 3, 4];
        $sum = 0;

        foreach ($multipliers as $i => $factor) {
            $sum += $factor * (int) $document[$i];
        }

        return (10 - ($sum % 10)) % 10;
    }

    /**
     * Generates a random valid CI document.
     *
     * @return string
     */
    public function generateRandomDocument(): string
    {
        $number = (string) rand(100000, 9999999);
        return $number . $this->calculateCheckDigit($number);
    }

    /**
     * Removes all non-numeric characters from the document.
     *
     * @param string $document
     * @return string
     */
    protected function sanitize(string $document): string
    {
        return preg_replace('/\D/', '', $document);
    }

    /**
     * Splits the document into number and check digit.
     *
     * @param string $document
     * @return array ['number' => string, 'check' => string]
     */
    protected function split(string $document): array
    {
        return [
            'number' => substr($document, 0, -1),
            'check' => substr($document, -1),
        ];
    }
}
