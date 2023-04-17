<?php

namespace App\Providers;

use App\Models\School;
use Database\Factories\SchoolFactory;
use Illuminate\Support\ServiceProvider;

class FactoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        School::factory(new SchoolFactory());
    }
}
