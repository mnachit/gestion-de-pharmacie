<?php

namespace App\Providers;

use App\Models\Panier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\PanierController;
use Illuminate\Contracts\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $test = Panier::where('user_id', $user->id)->get();
        //     dd($test);
        // }
    }

}
