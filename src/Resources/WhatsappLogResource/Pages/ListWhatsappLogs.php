<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappLogResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappLogResource;

class ListWhatsappLogs extends ListRecords
{
    protected static string $resource = WhatsappLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
