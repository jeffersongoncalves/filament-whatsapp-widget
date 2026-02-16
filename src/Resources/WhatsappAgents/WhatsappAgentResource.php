<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents;

use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\Schemas\WhatsappAgentForm;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\Schemas\WhatsappAgentInfolist;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\Tables\WhatsappAgentsTable;
use JeffersonGoncalves\Filament\WhatsappWidget\Support\Utils;

class WhatsappAgentResource extends Resource
{
    public static function form(Schema $schema): Schema
    {
        return WhatsappAgentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WhatsappAgentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WhatsappAgentsTable::configure($table);
    }

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
        return Utils::getResourceCluster() ?? static::$cluster;
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
        return Utils::isResourceNavigationRegistered();
    }

    public static function getNavigationGroup(): ?string
    {
        if (Utils::isResourceNavigationGroupEnabled()) {
            return __('filament-whatsapp-widget::filament-whatsapp-widget.nav.group');
        }

        return '';
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-whatsapp-widget::filament-whatsapp-widget.nav.whatsapp_agent.label');
    }

    public static function getNavigationIcon(): string
    {
        return Utils::getResourceNavigationIcon();
    }

    public static function getNavigationSort(): ?int
    {
        return Utils::getResourceNavigationSort();
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return Utils::getResourceSlug();
    }

    public static function getNavigationBadge(): ?string
    {
        if (Utils::isResourceNavigationBadgeEnabled()) {
            return strval(static::getEloquentQuery()->count());
        }

        return null;
    }
}
