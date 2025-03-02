<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Support;

use Filament\Panel;
use JeffersonGoncalves\WhatsappWidget\Models\WhatsappAgent;
use JeffersonGoncalves\WhatsappWidget\Models\WhatsappLog;

class Utils
{
    public static function isWhatsappAgentResourcePublished(Panel $panel): bool
    {
        return str(string: collect(value: $panel->getResources())->values()->join(','))
            ->contains('WhatsappAgentResource');
    }

    public static function isWhatsappLogResourcePublished(Panel $panel): bool
    {
        return str(string: collect(value: $panel->getResources())->values()->join(','))
            ->contains('WhatsappAgentLog');
    }

    public static function getWhatsappAgentResourceCluster(): ?string
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.cluster', null);
    }

    public static function getWhatsappAgentModel(): string
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.model', WhatsappAgent::class);
    }

    public static function isWhatsappAgentResourceNavigationRegistered(): bool
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.should_register_navigation', true);
    }

    public static function isWhatsappAgentResourceNavigationGroupEnabled(): bool
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.navigation_group', true);
    }

    public static function getWhatsappAgentResourceNavigationSort(): ?int
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.navigation_sort');
    }

    public static function getWhatsappAgentResourceSlug(): string
    {
        return (string)config('filament-whatsapp-widget.whatsapp_agent_resource.slug');
    }

    public static function isWhatsappAgentResourceNavigationBadgeEnabled(): bool
    {
        return config('filament-whatsapp-widget.whatsapp_agent_resource.navigation_badge', true);
    }

    public static function getWhatsappLogResourceCluster(): ?string
    {
        return config('filament-whatsapp-widget.whatsapp_log_resource.cluster', null);
    }

    public static function getWhatsappLogModel(): string
    {
        return config('filament-whatsapp-widget.whatsapp_log_resource.model', WhatsappLog::class);
    }

    public static function isWhatsappLogResourceNavigationRegistered(): bool
    {
        return config('filament-whatsapp-widget.whatsapp_log_resource.should_register_navigation', true);
    }

    public static function isWhatsappLogResourceNavigationGroupEnabled(): bool
    {
        return config('filament-whatsapp-widget.whatsapp_log_resource.navigation_group', true);
    }

    public static function getWhatsappLogResourceNavigationSort(): ?int
    {
        return config('filament-whatsapp-widget.whatsapp_log_resource.navigation_sort');
    }

    public static function getWhatsappLogResourceSlug(): string
    {
        return (string)config('filament-whatsapp-widget.whatsapp_log_resource.slug');
    }

    public static function isWhatsappLogResourceNavigationBadgeEnabled(): bool
    {
        return config('filament-whatsapp-widget.whatsapp_log_resource.navigation_badge', true);
    }
}
