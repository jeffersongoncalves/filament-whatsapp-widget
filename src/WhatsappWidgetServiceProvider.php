<?php

namespace JeffersonGoncalves\Filament\WhatsappWidget;

use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class WhatsappWidgetServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-whatsapp-widget')
            ->hasConfigFile()
            ->hasTranslations();
    }

    public function packageRegistered(): void
    {
        FilamentView::registerRenderHook(PanelsRenderHook::HEAD_START, fn (): View => view('whatsapp-widget::whatsapp-widget-head'));
        FilamentView::registerRenderHook(PanelsRenderHook::BODY_END, fn (): View => view('whatsapp-widget::whatsapp-widget-body'));
    }
}
