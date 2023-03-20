<?php

namespace Pfrug\ValidateDocumentUy;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Pfrug\ValidateDocumentUy\ValidateCI;
use Pfrug\ValidateDocumentUy\Rules\DocumentUyRule;

class ValidateCIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslations();
        $this->registerValidationRules();
    }

    public function register(): void
    {
        $this->registerBindings();
    }

    private function registerValidationRules(): void
    {
        Validator::extend(
            'documentUy',
            DocumentUyRule::class . '@passes',
            trans('validate-document-uy::validation.documentUy')
        );
    }

    protected function registerBindings(): void
    {
        $this->app->singleton('validate_ci', ValidateCI::class);
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
