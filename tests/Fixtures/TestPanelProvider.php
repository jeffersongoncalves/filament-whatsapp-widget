<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Tests\Fixtures;

use Filament\Panel;
use Filament\PanelProvider;
use JeffersonGoncalves\Filament\WhatsappWidget\WhatsappWidgetPlugin;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('test')
            ->path('test')
            ->plugin(WhatsappWidgetPlugin::make());
    }
}
