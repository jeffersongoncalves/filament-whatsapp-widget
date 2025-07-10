<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Support;

use Filament\Panel;
use JeffersonGoncalves\WhatsappWidget\Models\WhatsappAgent;

class Utils
{
    public static function isResourcePublished(Panel $panel): bool
    {
        return str(string: collect(value: $panel->getResources())->values()->join(','))
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
