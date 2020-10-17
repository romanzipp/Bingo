<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use romanzipp\Seo\Helpers\Hook;
use romanzipp\Seo\Structs;

class SeoServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Structs\Title::hook(
            Hook::make()
                ->onBody()
                ->callback(function ($body) {
                    return ($body ? $body . ' | ' : '') . config('app.name');
                })
        );

        seo()->charset();
        seo()->viewport();

        seo()->title('Just Bingo');
        seo()->description('Create public shareable interactive bingo games with unlimited players. No account required. No ads. No bullshit.');

        seo()->addMany([

            Structs\Meta::make()->name('copyright')->content('Roman Zipp'),

            Structs\Meta::make()->name('mobile-web-app-capable')->content('yes'),
            Structs\Meta::make()->name('theme-color')->content('#0583f2'),

            Structs\Link::make()->rel('icon')->href(asset('/images/Logo.png')),

            Structs\Meta\OpenGraph::make()->property('site_name')->content(config('app.name')),
            Structs\Meta\OpenGraph::make()->property('locale')->content(config('app.locale')),

        ]);
    }
}
