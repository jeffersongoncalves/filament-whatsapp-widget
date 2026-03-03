---
name: filament-whatsapp-widget-development
description: Build and work with the Filament WhatsApp Widget plugin, including agent management, widget configuration, resource customization, and frontend integration.
---

# Filament WhatsApp Widget Development

## When to use this skill

Use this skill when:
- Setting up the WhatsApp floating widget on a website
- Managing WhatsApp agents via the Filament admin panel
- Customizing the WhatsApp agent resource (cluster, navigation, slug)
- Integrating the widget on non-Filament pages
- Configuring widget position, audio, or redirect behavior
- Troubleshooting widget rendering or phone input issues

## Architecture

This plugin is a Filament wrapper for `jeffersongoncalves/laravel-whatsapp-widget`. It provides:
- `WhatsappWidgetPlugin` - Filament plugin that auto-registers the agent resource
- `WhatsappWidgetServiceProvider` - Service provider that injects widget head/body views
- `WhatsappAgentResource` - Full CRUD resource for managing agents
- `Utils` - Configuration helper class for resource settings

### Namespace

```
JeffersonGoncalves\Filament\WhatsappWidget
```

### Key Classes

| Class | Path | Purpose |
|-------|------|---------|
| `WhatsappWidgetPlugin` | `src/WhatsappWidgetPlugin.php` | Plugin class, auto-registers resource |
| `WhatsappWidgetServiceProvider` | `src/WhatsappWidgetServiceProvider.php` | Injects widget head/body views |
| `WhatsappAgentResource` | `src/Resources/WhatsappAgents/WhatsappAgentResource.php` | Filament CRUD resource |
| `WhatsappAgentForm` | `src/Resources/WhatsappAgents/Schemas/WhatsappAgentForm.php` | Form schema for agent |
| `WhatsappAgentInfolist` | `src/Resources/WhatsappAgents/Schemas/WhatsappAgentInfolist.php` | Infolist schema for viewing |
| `WhatsappAgentsTable` | `src/Resources/WhatsappAgents/Tables/WhatsappAgentsTable.php` | Table configuration |
| `Utils` | `src/Support/Utils.php` | Config helper for resource settings |

### Dependencies

| Package | Purpose |
|---------|---------|
| `jeffersongoncalves/laravel-whatsapp-widget` | Core widget (models, views, assets, migrations) |
| `ysfkaya/filament-phone-input` | International phone number input component |

## Installation

```bash
composer require jeffersongoncalves/filament-whatsapp-widget
```

### Publish Config Files

```bash
# Core widget config
php artisan vendor:publish --tag=whatsapp-widget-config

# Filament resource config
php artisan vendor:publish --tag=filament-whatsapp-widget-config
```

### Publish Migrations

```bash
php artisan vendor:publish --tag=whatsapp-widget-migrations
php artisan migrate
```

### Publish Assets

```bash
php artisan vendor:publish --tag=whatsapp-widget-assets
php artisan vendor:publish --tag=filament-phone-input-assets
```

## Configuration

### Register the Plugin

```php
use JeffersonGoncalves\Filament\WhatsappWidget\WhatsappWidgetPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            WhatsappWidgetPlugin::make(),
        ]);
}
```

### Core Widget Config (`config/whatsapp-widget.php`)

```php
return [
    // Enable or disable audio notification
    'audio' => true,

    // Play audio notification once per day or on every page load
    'play_audio_daily' => true,

    // Filesystem disk for storing agent images
    'disk' => env('FILESYSTEM_DISK', 'local'),

    // Application URL (used for redirection)
    'url' => env('APP_URL', 'http://localhost'),

    // Application name (displayed in the widget)
    'name' => env('APP_NAME', 'Laravel App'),

    // WhatsApp API key (if needed)
    'key' => env('WHATSAPP_KEY'),

    // Widget position on the screen (left or right)
    'position' => 'right',
];
```

### Filament Resource Config (`config/filament-whatsapp-widget.php`)

```php
use JeffersonGoncalves\WhatsappWidget\Models\WhatsappAgent;

return [
    'whatsapp_agent_resource' => [
        'cluster' => null,
        'model' => WhatsappAgent::class,
        'should_register_navigation' => true,
        'navigation_group' => true,
        'navigation_badge' => true,
        'navigation_sort' => -1,
        'navigation_icon' => 'heroicon-s-chat-bubble-left',
        'slug' => 'whatsapp/whatsapp-agent',
    ],
];
```

## How It Works

### Plugin Class

The plugin auto-registers `WhatsappAgentResource` unless you have already registered your own resource with the same name:

```php
namespace JeffersonGoncalves\Filament\WhatsappWidget;

use Filament\Contracts\Plugin;
use Filament\Panel;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\WhatsappAgentResource;
use JeffersonGoncalves\Filament\WhatsappWidget\Support\Utils;

class WhatsappWidgetPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'filament-whatsapp-widget';
    }

    public function register(Panel $panel): void
    {
        if (! Utils::isResourcePublished($panel)) {
            $panel->resources([WhatsappAgentResource::class]);
        }
    }

    public function boot(Panel $panel): void {}
}
```

### Service Provider (Widget Injection)

The service provider injects widget views into the panel layout:

```php
namespace JeffersonGoncalves\Filament\WhatsappWidget;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WhatsappWidgetServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-whatsapp-widget')
            ->hasConfigFile()
            ->hasTranslations();
    }

    public function packageRegistered(): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_START,
            fn (): View => view('whatsapp-widget::whatsapp-widget-head')
        );
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_END,
            fn (): View => view('whatsapp-widget::whatsapp-widget-body')
        );
    }
}
```

### Utils Helper Class

The `Utils` class reads all configuration values for the resource:

```php
namespace JeffersonGoncalves\Filament\WhatsappWidget\Support;

use Filament\Panel;
use JeffersonGoncalves\WhatsappWidget\Models\WhatsappAgent;

class Utils
{
    public static function isResourcePublished(Panel $panel): bool
    {
        return str(collect($panel->getResources())->values()->join(','))
            ->contains('WhatsappAgentResource');
    }

    public static function getResourceCluster(): ?string
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.cluster', null);
    }

    public static function getWhatsappAgentModel(): string
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.model', WhatsappAgent::class);
    }

    public static function isResourceNavigationRegistered(): bool
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.should_register_navigation', true);
    }

    public static function isResourceNavigationGroupEnabled(): bool
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.navigation_group', true);
    }

    public static function getResourceNavigationSort(): ?int
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.navigation_sort');
    }

    public static function getResourceNavigationIcon(): string
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.navigation_icon', 'heroicon-s-chat-bubble-left');
    }

    public static function getResourceSlug(): string
    {
        return (string) config('filament-whatsapp-widget.whatsapp_agent_resource.slug');
    }

    public static function isResourceNavigationBadgeEnabled(): bool
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.navigation_badge', true);
    }
}
```

### Agent Form Schema

The form uses `ysfkaya/filament-phone-input` for international phone number formatting:

```php
namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;

class WhatsappAgentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Toggle::make('active')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.active'))
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('name')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.name'))
                    ->required()
                    ->maxLength(255),
                PhoneInput::make('phone')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.phone'))
                    ->validateFor()
                    ->displayNumberFormat(PhoneInputNumberType::INTERNATIONAL),
                TextInput::make('text')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.text'))
                    ->maxLength(255)
                    ->default(null),
                FileUpload::make('image')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.image'))
                    ->image()
                    ->disk(config('whatsapp-widget.disk')),
            ]);
    }
}
```

### Agent Fields

| Field | Type | Description |
|-------|------|-------------|
| `active` | Toggle | Whether the agent is active/visible |
| `name` | TextInput | Agent display name (required, max 255) |
| `phone` | PhoneInput | WhatsApp phone number (international format) |
| `text` | TextInput | Default message text (max 255) |
| `image` | FileUpload | Agent avatar image |

## Usage on Non-Filament Pages

Include the widget views in your Blade layout:

```php
{{-- In <head> --}}
@include('whatsapp-widget::whatsapp-widget-head')

{{-- Before </body> --}}
@include('whatsapp-widget::whatsapp-widget-body')
```

## Overriding the Resource

To use your own custom resource instead of the built-in one, register a resource with `WhatsappAgentResource` in its class name before the plugin registers:

```php
// In your PanelProvider
$panel->resources([
    \App\Filament\Resources\WhatsappAgentResource::class,
]);
```

The plugin checks `Utils::isResourcePublished($panel)` and skips auto-registration if a resource containing `WhatsappAgentResource` in its name is already registered.

## Troubleshooting

### Widget Not Appearing on Frontend
**Cause**: Assets not published or views not rendering.
**Solution**: Run `php artisan vendor:publish --tag=whatsapp-widget-assets` and ensure the head/body views are included in your layout.

### Phone Input Not Working
**Cause**: Phone input assets not published.
**Solution**: Run `php artisan vendor:publish --tag=filament-phone-input-assets`.

### Resource Not Showing in Navigation
**Cause**: `should_register_navigation` is set to `false` in config.
**Solution**: Set `should_register_navigation` to `true` in `config/filament-whatsapp-widget.php`.

### Agent Images Not Uploading
**Cause**: Filesystem disk not configured or not writable.
**Solution**: Check the `disk` value in `config/whatsapp-widget.php` and ensure the disk is configured in `config/filesystems.php` with proper write permissions.

### Duplicate Resource Registration
**Cause**: You registered your own `WhatsappAgentResource` and the plugin also registered one.
**Solution**: The plugin auto-detects existing resources. Ensure your custom resource class name contains `WhatsappAgentResource` so the plugin skips auto-registration.
