# Changelog

All notable changes to this project will be documented in this file.

## [v3.0.0] - 2025-04-16

### Changed
- Renamed facade to `ValidateDocumentUy`
- Renamed service provider to `ValidateDocumentUyServiceProvider`
- Renamed rule class to `ValidUruguayanCiRule`
- Standardized class structure and naming across the package
- Dropped Laravel 10 compatibility
- Added support for shorthand validation rule: `validate_ci`
- Refactored internal validator logic and improved code quality

### Removed
- Legacy class names: `ValidateCI`, `DocumentUy`, `DocumentUyServiceProvider`
- Laravel 10 support and related configuration references
