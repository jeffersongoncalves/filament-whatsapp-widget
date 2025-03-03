<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource\Pages;
use JeffersonGoncalves\Filament\WhatsappWidget\Support\Utils;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\Infolists\PhoneEntry;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;

class WhatsappAgentResource extends Resource
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('active')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.active'))
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.name'))
                    ->required()
                    ->maxLength(255),
                PhoneInput::make('phone')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.phone'))
                    ->validateFor()
                    ->displayNumberFormat(PhoneInputNumberType::INTERNATIONAL),
                Forms\Components\TextInput::make('text')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.text'))
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\FileUpload::make('image')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.image'))
                    ->image()
                    ->disk(config('whatsapp-widget.disk')),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make()
                    ->description()
                    ->columns()
                    ->schema([
                        Infolists\Components\IconEntry::make('active')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.active'))
                            ->boolean(),
                        Infolists\Components\TextEntry::make('name')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.name')),
                        PhoneEntry::make('phone')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.phone'))
                            ->displayFormat(PhoneInputNumberType::INTERNATIONAL),
                        Infolists\Components\TextEntry::make('text')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.text')),
                        Infolists\Components\ImageEntry::make('image')
                            ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.image'))
                            ->disk(config('whatsapp-widget.disk')),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('active')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.active'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.phone'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('text')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.text'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.image'))
                    ->disk(config('whatsapp-widget.disk')),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('filament-whatsapp-widget::filament-whatsapp-widget.column.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
        return __('filament-whatsapp-widget::filament-whatsapp-widget.nav.whatsapp_agent.icon');
    }

    public static function getNavigationSort(): ?int
    {
        return Utils::getResourceNavigationSort();
    }

    public static function getSlug(): string
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
