<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Ysfkaya\FilamentPhoneInput\Infolists\PhoneEntry;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;

class WhatsappAgentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
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
}
