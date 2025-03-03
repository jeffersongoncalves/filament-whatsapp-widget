<div class="filament-hidden">

![Laravel Created By](https://raw.githubusercontent.com/jeffersongoncalves/filament-whatsapp-widget/master/art/jeffersongoncalves-filament-whatsapp-widget.png)

</div>

# Filament Whatsapp Widget

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-whatsapp-widget.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-whatsapp-widget)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-whatsapp-widget/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-whatsapp-widget/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-whatsapp-widget.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-whatsapp-widget)

This Filament package provides a simple yet customizable WhatsApp widget for your website. It allows you to easily add a clickable WhatsApp button or floating widget to connect visitors directly with your WhatsApp account. The widget is designed to be easily integrated into your Laravel application and is fully customizable to match your website's design.

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-whatsapp-widget
```

## Usage

Publish config file.

```bash
php artisan vendor:publish --tag=whatsapp-widget-config
php artisan vendor:publish --tag=filament-whatsapp-widget-config
```

Publish migration file.

```bash
php artisan vendor:publish --tag=whatsapp-widget-migrations
```

Publish assets file.

```bash
php artisan vendor:publish --tag=whatsapp-widget-assets
php artisan vendor:publish --tag=filament-phone-input-assets
```

Add in AdminPanelProvider.php

```php
use JeffersonGoncalves\Filament\WhatsappWidget\WhatsappWidgetPlugin;

->plugins([
    WhatsappWidgetPlugin::make(),
])
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
