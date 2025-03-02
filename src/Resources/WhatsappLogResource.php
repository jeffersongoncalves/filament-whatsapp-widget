<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources;

use Filament\Resources\Resource;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappLogResource\Pages;
use JeffersonGoncalves\Filament\WhatsappWidget\Support\Utils;

class WhatsappLogResource extends Resource
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
            'index' => Pages\ListWhatsappLogs::route('/'),
            'create' => Pages\CreateWhatsappLog::route('/create'),
            'view' => Pages\ViewWhatsappLog::route('/{record}'),
            'edit' => Pages\EditWhatsappLog::route('/{record}/edit'),
        ];
    }

    public static function getCluster(): ?string
    {
        return Utils::getWhatsappLogResourceCluster() ?? static::$cluster;
    }

    public static function getModel(): string
    {
        return Utils::getWhatsappLogModel();
    }

    public static function getModelLabel(): string
    {
        return __('filament-whatsapp-widget::filament-whatsapp-widget.resource.label.whatsapp_log');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-whatsapp-widget::filament-whatsapp-widget.resource.label.whatsapp_logs');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Utils::isWhatsappLogResourceNavigationRegistered();
    }

    public static function getNavigationGroup(): ?string
    {
        return Utils::isWhatsappLogResourceNavigationGroupEnabled()
            ? __('filament-whatsapp-widget::filament-whatsapp-widget.nav.group')
            : '';
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-whatsapp-widget::filament-whatsapp-widget.nav.whatsapp_log.label');
    }

    public static function getNavigationIcon(): string
    {
        return __('filament-whatsapp-widget::filament-whatsapp-widget.nav.whatsapp_log.icon');
    }

    public static function getNavigationSort(): ?int
    {
        return Utils::getWhatsappLogResourceNavigationSort();
    }

    public static function getSlug(): string
    {
        return Utils::getWhatsappLogResourceSlug();
    }

    public static function getNavigationBadge(): ?string
    {
        return Utils::isWhatsappLogResourceNavigationBadgeEnabled()
            ? strval(static::getEloquentQuery()->count())
            : null;
    }
}
