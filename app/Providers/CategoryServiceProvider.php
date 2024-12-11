<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class CategoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
      
        View::composer('*', function ($view) {
            $view->with('AllCategory', Category::all());  
        });
    }

    public function register()
    {
        //
    }
}
