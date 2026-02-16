<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\WhatsappAgentResource;

class ViewWhatsappAgent extends ViewRecord
{
    protected static string $resource = WhatsappAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            DeleteAction::make(),
        ];
    }
}
