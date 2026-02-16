<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;

class WhatsappAgentForm
{
    public static function configure(Schema $schema): Schema
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
}
