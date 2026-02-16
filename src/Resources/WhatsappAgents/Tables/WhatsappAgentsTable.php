<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WhatsappAgentsTable
{
    public static function configure(Table $table): Table
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
}
