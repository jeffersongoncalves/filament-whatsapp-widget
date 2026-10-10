<?php

use Illuminate\Support\Facades\Blade;
use JeffersonGoncalves\Filament\WhatsappWidget\Resources\WhatsappAgentResource;
use JeffersonGoncalves\Filament\WhatsappWidget\WhatsappWidgetPlugin;

it('loads every class it ships', function (string $class) {
    expect(class_exists($class) || interface_exists($class) || trait_exists($class))->toBeTrue();
})->with([
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgentResource\\Pages\\CreateWhatsappAgent',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgentResource\\Pages\\EditWhatsappAgent',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgentResource\\Pages\\ListWhatsappAgents',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgentResource\\Pages\\ViewWhatsappAgent',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Resources\\WhatsappAgentResource',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\Support\\Utils',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\WhatsappWidgetPlugin',
    'JeffersonGoncalves\\Filament\\WhatsappWidget\\WhatsappWidgetServiceProvider',
]);

it('registers on a panel', function () {
    $panel = Filament\Facades\Filament::getPanel('test');

    expect($panel->hasPlugin(WhatsappWidgetPlugin::make()->getId()))->toBeTrue()
        ->and($panel->getResources())->toContain(WhatsappAgentResource::class);
});
