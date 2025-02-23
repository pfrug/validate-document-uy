<?php

namespace Pfrug\ValidateDocumentUy;

use Illuminate\Support\ServiceProvider;

class ValidateCIServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslations();
    }

    public function register(): void
    {
        $this->registerBindings();
    }

    protected function registerBindings(): void
    {
        $this->app->singleton('validate_ci', function () {
            return new \App\Services\ValidateCI();
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
