<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WhatsappWidgetServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-whatsapp-widget');
    }
}
