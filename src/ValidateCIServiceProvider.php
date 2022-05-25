<?php

namespace Frugone\ValidateDocumentUy;

use Illuminate\Support\ServiceProvider;

class ValidateCIServiceProvider extends ServiceProvider
{

    public function register(): void
    {
       // $this->commands([ValidateCI::class]);
        $this->registerValidationRules();
    }

    private function registerValidationRules(): void
    {
        $this->app->validator->extend('CI_UY', ValidateCI::class . '@passes');

    }
}
