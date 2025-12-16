<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // MENU CATEGORY – dùng cho layout public
        View::composer('layout.home', function ($view) {
            $view->with(
                'categories',
                Category::where('status', 1)->get()
            );
        });

        // FOOTER / SETTING (nếu có)
        View::composer('layout.*', function ($view) {
            $view->with('site_name', config('app.name'));
        });
    }
}
