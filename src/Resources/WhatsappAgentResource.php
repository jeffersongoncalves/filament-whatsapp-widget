<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource\Pages\CreateWhatsappAgent;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource\Pages\EditWhatsappAgent;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource\Pages\ListWhatsappAgents;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource\Pages\ViewWhatsappAgent;
use JeffersonGoncalves\Filament\WhatsappWidget\Support\Utils;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\Infolists\PhoneEntry;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;

class WhatsappAgentResource extends Resource
{
    public static function form(Schema $schema): Schema
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

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->description()
                    ->columns()
                    ->schema([
                        IconEntry::make('active')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.active'))
                            ->boolean()
                            ->columnSpanFull(),
                        TextEntry::make('name')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.name')),
                        PhoneEntry::make('phone')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.phone'))
                            ->displayFormat(PhoneInputNumberType::INTERNATIONAL),
                        TextEntry::make('text')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.text')),
                        ImageEntry::make('image')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.image'))
                            ->disk(config('whatsapp-widget.disk')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('active')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.active'))
                    ->boolean(),
                TextColumn::make('name')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.name'))
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.phone'))
                    ->searchable(),
                TextColumn::make('text')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.text'))
                    ->searchable(),
                ImageColumn::make('image')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.image'))
                    ->disk(config('whatsapp-widget.disk')),
                TextColumn::make('created_at')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
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
            'index' => ListWhatsappAgents::route('/'),
            'create' => CreateWhatsappAgent::route('/create'),
            'view' => ViewWhatsappAgent::route('/{record}'),
            'edit' => EditWhatsappAgent::route('/{record}/edit'),
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
