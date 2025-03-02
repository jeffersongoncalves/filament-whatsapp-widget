<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource;

class ListWhatsappAgents extends ListRecords
{
    protected static string $resource = WhatsappAgentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
