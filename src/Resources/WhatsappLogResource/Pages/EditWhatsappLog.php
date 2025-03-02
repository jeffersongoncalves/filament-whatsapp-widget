<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappLogResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappLogResource;

class EditWhatsappLog extends EditRecord
{
    protected static string $resource = WhatsappLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
