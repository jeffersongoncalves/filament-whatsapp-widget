<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\WhatsappAgentResource;

class ListWhatsappAgents extends ListRecords
{
    protected static string $resource = WhatsappAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
