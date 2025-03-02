<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget\Support;

use Filament\Panel;

class Utils
{
    public static function isWhatsappAgentResourcePublished(Panel $panel): bool
    {
        return str(string: collect(value: $panel->getResources())->values()->join(','))
            ->contains('WhatsappAgentResource');
    }

    public static function isWhatsappLogResourcePublished(Panel $panel): bool
    {
        return str(string: collect(value: $panel->getResources())->values()->join(','))
            ->contains('WhatsappAgentLog');
    }
}
