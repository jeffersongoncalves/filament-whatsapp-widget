<?php

use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgents\WhatsappAgentResource;
use JeffersonGoncalves\Filament\WhatsappWidget\WhatsappWidgetPlugin;

it('loads every class it ships', function (string $class) {
    expect(class_exists($class) || interface_exists($class) || trait_exists($class))->toBeTrue();
})->with([
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgents\\Pages\\CreateWhatsappAgent',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgents\\Pages\\EditWhatsappAgent',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgents\\Pages\\ListWhatsappAgents',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgents\\Pages\\ViewWhatsappAgent',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgents\\Schemas\\WhatsappAgentForm',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgents\\Schemas\\WhatsappAgentInfolist',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgents\\Tables\\WhatsappAgentsTable',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgents\\WhatsappAgentResource',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Support\\Utils',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\WhatsappWidgetPlugin',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\WhatsappWidgetServiceProvider',
]);

it('registers on a panel', function () {
    $panel = Filament\Facades\Filament::getPanel('test');

    expect($panel->hasPlugin(WhatsappWidgetPlugin::make()->getId()))->toBeTrue()
        ->and($panel->getResources())->toContain(WhatsappAgentResource::class);
});
