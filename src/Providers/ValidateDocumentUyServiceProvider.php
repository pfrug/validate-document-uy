<?php

namespace Pfrug\ValidateDocumentUy\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Pfrug\ValidateDocumentUy\Services\UruguayanCiValidator;
use Pfrug\ValidateDocumentUy\Support\ValidatesUruguayanCi;

class ValidateDocumentUyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(UruguayanCiValidator::class, fn () => new UruguayanCiValidator());
        $this->app->alias(UruguayanCiValidator::class, 'document-uy');
    }

    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'validate-document-uy');

        $this->publishes([
            __DIR__ . '/../../lang' => resource_path('lang/vendor/validate-document-uy'),
        ], 'validate-document-uy');

        Validator::extend('validate_ci', function ($attribute, $value, $parameters, $validator) {
            return (new class {
                use ValidatesUruguayanCi;
            })->isUruguayanCiValid($value);
        }, __('validate-document-uy::validation.validate_ci'));
    }
}
