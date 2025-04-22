<?php

namespace Pfrug\ValidateDocumentUy;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidateCIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslations();

        Validator::extend('validate_ci', function ($attribute, $value, $parameters, $validator) {
            return (new \Pfrug\ValidateDocumentUy\ValidateCI())->isValid($value);
        }, __('validate-document-uy::validation.document_uy'));
    }

    public function register(): void
    {
        $this->registerBindings();
    }

    protected function registerBindings(): void
    {
        $this->app->singleton('validate_ci', function () {
            return new \Pfrug\ValidateDocumentUy\ValidateCI();
        });
    }

    private function loadTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../lang/', 'validate-document-uy');

        $this->publishes(
            [
                __DIR__ . '/../lang/' => resource_path('lang/vendor/validate-document-uy'),
            ],
            'validate-document-uy'
        );
    }
}
