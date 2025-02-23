# ValidateUy

Library to validate Uruguayan identity document

## Installation
``` sh
composer require pfrug/validate-document-uy
```

```php
// Laravel < 10: config/app.php
'providers' => [
    ...
    Pfrug\ValidateDocumentUy\ValidateCIServiceProvider::class,
];

Laravel >= 11 bootstrap/providers.php
return [
    ...
    Pfrug\ValidateDocumentUy\ValidateCIServiceProvider::class,
];

```

And optionally register an alias for the facade.

```php

// Laravel < 10: config/app.php
'aliases' => [
    ...
    'ValidateCI' => Pfrug\ValidateDocumentUy\Facades\ValidateCI::class,
];

```

## Usage

```php
ValidateCI::isValid('30780892'); // true
ValidateCI::isValid('3.078.089-2'); // true
ValidateCI::isValid('30780890'); // false
ValidateCI::controlDigit('3078089'); // 2
ValidateCI::gerRandomDocument(); 
```

### Validation 
The package provides custom rules to validate a Uruguayan document
```php
$validator = Validator::make($data, [
    'document1' => 'validate_ci',         // Using shorthand notation
    'document2' => new DocumentUyRule(), // Using custom rule class    
]);
```

## Configuration

Optionally you can Publish the language files for translations

```sh
 php artisan vendor:publish --tag="validate-document-uy"
```

This command create file translations to: `{project}resources/lang/vendor/validate-document-uy/{en-es}/validation.php`

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
