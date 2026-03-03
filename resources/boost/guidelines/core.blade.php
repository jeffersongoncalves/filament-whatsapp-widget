## Filament WhatsApp Widget

A Filament plugin that provides a customizable WhatsApp floating widget for websites with a Filament resource to manage WhatsApp agents. Wraps `jeffersongoncalves/laravel-whatsapp-widget` with a full admin UI.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-whatsapp-widget
</code-snippet>
@endverbatim

### Register Plugin

@verbatim
<code-snippet name="Register in PanelProvider" lang="php">
use JeffersonGoncalves\Filament\WhatsappWidget\WhatsappWidgetPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            WhatsappWidgetPlugin::make(),
        ]);
}
</code-snippet>
@endverbatim

### Publish Config and Migrations

@verbatim
<code-snippet name="Publish config, migrations, and assets" lang="bash">
php artisan vendor:publish --tag=whatsapp-widget-config
php artisan vendor:publish --tag=filament-whatsapp-widget-config
php artisan vendor:publish --tag=whatsapp-widget-migrations
php artisan vendor:publish --tag=whatsapp-widget-assets
php artisan vendor:publish --tag=filament-phone-input-assets
php artisan migrate
</code-snippet>
@endverbatim

### Manual Usage on Non-Filament Pages

@verbatim
<code-snippet name="Include widget in Blade layouts" lang="php">
{{-- In <head> --}}
@include('whatsapp-widget::whatsapp-widget-head')

{{-- Before </body> --}}
@include('whatsapp-widget::whatsapp-widget-body')
</code-snippet>
@endverbatim

### Features
- Floating WhatsApp button/widget on websites
- Filament resource (CRUD) for managing WhatsApp agents
- Agent fields: name, phone (international format), text message, image, active toggle
- Configurable widget position (left or right)
- Audio notification support (once per day or every page load)
- Redirect page before opening WhatsApp
- Navigation badge showing agent count
- Configurable resource: cluster, slug, navigation group, icon, sort order
- Multi-language support (17+ languages)
- Phone input with international format via `ysfkaya/filament-phone-input`

### Configuration Keys (`config/filament-whatsapp-widget.php`)
- `whatsapp_agent_resource.cluster` - Filament cluster for the resource
- `whatsapp_agent_resource.model` - Model class (default: `WhatsappAgent`)
- `whatsapp_agent_resource.should_register_navigation` - Show in navigation
- `whatsapp_agent_resource.navigation_badge` - Show agent count badge
- `whatsapp_agent_resource.navigation_sort` - Navigation sort order
- `whatsapp_agent_resource.navigation_icon` - Navigation icon
- `whatsapp_agent_resource.slug` - Resource URL slug

### Best Practices
- Publish both `whatsapp-widget-config` and `filament-whatsapp-widget-config` for full control
- Run migrations before accessing the WhatsApp agents resource
- Use `whatsapp-widget-assets` publish to include CSS/JS for the frontend widget
- The plugin auto-registers the WhatsappAgentResource unless you register your own
