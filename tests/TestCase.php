<?php

namespace Frugone\ValidateDocumentUy\Tests;

use Frugone\ValidateDocumentUy\ValidateCIServiceProvider;
use Frugone\ValidateDocumentUy\Facades\ValidateCI;

class TestCase extends \Orchestra\Testbench\TestCase
{

    public const VALID_DOCUMENT = '12345672';
    public const INVALID_DOCUMENT = '12345678';

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ValidateCIServiceProvider::class,
        ];
    }

    /**
     * Override application aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'ValidateCI', ValidateCI::class
        ];
    }
}
