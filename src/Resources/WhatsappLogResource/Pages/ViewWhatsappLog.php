<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappLogResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappLogResource;

class ViewWhatsappLog extends ViewRecord
{
    protected static string $resource = WhatsappLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
