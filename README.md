# Filament Cookie Consent

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-whatsapp-widget.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-whatsapp-widget)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-whatsapp-widget/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-whatsapp-widget/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-whatsapp-widget.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-whatsapp-widget)


## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-whatsapp-widget
```

## Usage

Publish config file.

```bash
php artisan vendor:publish --tag=whatsapp-widget-config
```

Publish config file.

```bash
php artisan vendor:publish --tag=whatsapp-widget-migrations
```

Add head template.

```php
@include('whatsapp-widget::whatsapp-widget-head')
```

Add body template.

```php
@include('whatsapp-widget::whatsapp-widget-body')
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jèfferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
