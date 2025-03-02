<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget;

use Filament\Contracts\Plugin;
use Filament\Panel;
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
        if (! Utils::isWhatsappAgentResourcePublished($panel)) {
            $panel->resources([Resources\WhatsappAgentResource::class]);
        }
        if (! Utils::isWhatsappLogResourcePublished($panel)) {
            $panel->resources([Resources\WhatsappLogResource::class]);
        }
    }

    public function boot(Panel $panel): void {}
}
