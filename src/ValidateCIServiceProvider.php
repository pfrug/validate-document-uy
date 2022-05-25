<?php

namespace Frugone\ValidateDocumentUy;

use Illuminate\Support\ServiceProvider;
use Frugone\ValidateDocumentUy\ValidateCI;
use Frugone\ValidateDocumentUy\Rules\DocumentUyRule;

use Illuminate\Support\Facades\Validator;

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
        Validator::extend( 'documentUy', DocumentUyRule::class . '@passes', trans('validate-document-uy::validation.documentUy'));
    }

    protected function registerBindings(): void
    {
        $this->app->singleton('validate_ci', ValidateCI::class);
    }

    private function loadTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang/', 'validate-document-uy');

        $this->publishes(
            [
                __DIR__ . '/../resources/lang' => resource_path('lang'),
            ],
            'validate-document-uy'
        );
    }
}
