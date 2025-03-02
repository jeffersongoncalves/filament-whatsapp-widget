<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource;

class EditWhatsappAgent extends EditRecord
{
    protected static string $resource = WhatsappAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
