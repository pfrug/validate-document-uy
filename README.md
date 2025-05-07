# ValidateDocumentUy

A Laravel 11+ package for validating Uruguayan identity documents (Cédula de Identidad).
Supports validation via rule class or shorthand string rule (`validate_ci`), includes localization support and random generation for testing.

## Installation

```bash
composer require pfrug/validate-document-uy
```

### Register the service provider

In `bootstrap/app.php`:

```php
use Pfrug\ValidateDocumentUy\Providers\ValidateDocumentUyServiceProvider;

->withProviders([
    ValidateDocumentUyServiceProvider::class,
])

```

---

## Usage

### Validation via string rule

```php
$request->validate([
    'document' => 'required|validate_ci',
]);
```

### Validation via rule class

```php
use Pfrug\ValidateDocumentUy\Rules\ValidUruguayanCiRule;

$request->validate([
    'document' => ['required', new ValidUruguayanCiRule()],
]);
```

### Using the facade

```php
use Pfrug\ValidateDocumentUy\Facades\ValidateDocumentUy;

ValidateDocumentUy::isValid('12345672'); // true
ValidateDocumentUy::controlDigit('1234567'); // returns 2
ValidateDocumentUy::generateRandomDocument(); // returns a valid CI string
```

---

## Translations

Validation messages are available in English and Spanish.

To publish the translation files:

```bash
php artisan vendor:publish --tag=validate-document-uy
```

The files will be located in:

```
resources/lang/vendor/validate-document-uy/en/validation.php
resources/lang/vendor/validate-document-uy/es/validation.php
```

---

## Tests

```bash
vendor/bin/phpunit
```

Includes unit and feature tests for all validation cases.

---

## Directory structure

```
src/
├── Facades/
│   └── ValidateDocumentUy.php
├── Providers/
│   └── ValidateDocumentUyServiceProvider.php
├── Rules/
│   └── ValidUruguayanCiRule.php
├── Services/
│   └── UruguayanCiValidator.php
├── Support/
│   └── ValidatesUruguayanCi.php
```

---

## License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).
