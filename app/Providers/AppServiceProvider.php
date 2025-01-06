<?php

namespace App\Providers;

use Livewire\Livewire;
use App\Livewire\CartComponent;
use App\Livewire\CartIconComponent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('cart-component', CartComponent::class);
    Livewire::component('cart-icon-component', CartIconComponent::class);
    }
}
