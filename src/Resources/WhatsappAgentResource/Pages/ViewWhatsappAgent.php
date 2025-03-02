<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource;

class ViewWhatsappAgent extends ViewRecord
{
    protected static string $resource = WhatsappAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
