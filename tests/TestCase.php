<?php

namespace Pfrug\ValidateDocumentUy\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Pfrug\ValidateDocumentUy\Providers\ValidateDocumentUyServiceProvider;
use Pfrug\ValidateDocumentUy\Facades\ValidateDocumentUy;

class TestCase extends BaseTestCase
{
    public const VALID_DOCUMENT = '12345672';
    public const INVALID_DOCUMENT = '12345678';

    protected function getPackageProviders($app): array
    {
        return [ValidateDocumentUyServiceProvider::class];
    }

    protected function getPackageAliases($app): array
    {
        return ['ValidateDocumentUy' => ValidateDocumentUy::class];
    }
}
