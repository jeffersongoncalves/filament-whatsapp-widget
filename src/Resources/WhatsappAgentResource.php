<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources;

use Filament\Resources\Resource;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource\Pages;
use JeffersonGoncalves\Filament\WhatsappWidget\Support\Utils;

class WhatsappAgentResource extends Resource
{
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWhatsappAgents::route('/'),
            'create' => Pages\CreateWhatsappAgent::route('/create'),
            'view' => Pages\ViewWhatsappAgent::route('/{record}'),
            'edit' => Pages\EditWhatsappAgent::route('/{record}/edit'),
        ];
    }

    public static function getCluster(): ?string
    {
        return Utils::getWhatsappAgentResourceCluster() ?? static::$cluster;
    }

    public static function getModel(): string
    {
        return Utils::getWhatsappAgentModel();
    }

    public static function getModelLabel(): string
    {
        return __('filament-whatsapp-widget::filament-whatsapp-widget.resource.label.whatsapp_agent');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-whatsapp-widget::filament-whatsapp-widget.resource.label.whatsapp_agents');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Utils::isWhatsappAgentResourceNavigationRegistered();
    }

    public static function getNavigationGroup(): ?string
    {
        return Utils::isWhatsappAgentResourceNavigationGroupEnabled()
            ? __('filament-whatsapp-widget::filament-whatsapp-widget.nav.group')
            : '';
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-whatsapp-widget::filament-whatsapp-widget.nav.whatsapp_agent.label');
    }

    public static function getNavigationIcon(): string
    {
        return __('filament-whatsapp-widget::filament-whatsapp-widget.nav.whatsapp_agent.icon');
    }

    public static function getNavigationSort(): ?int
    {
        return Utils::getWhatsappAgentResourceNavigationSort();
    }

    public static function getSlug(): string
    {
        return Utils::getWhatsappAgentResourceSlug();
    }

    public static function getNavigationBadge(): ?string
    {
        return Utils::isWhatsappAgentResourceNavigationBadgeEnabled()
            ? strval(static::getEloquentQuery()->count())
            : null;
    }

}
