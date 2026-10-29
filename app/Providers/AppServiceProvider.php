<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Paginator::defaultView('vendor.pagination.admin');

        // Share category list with navigation bar on public pages
        View::composer(['welcome', 'shop', 'about', 'contact', 'product-detail'], function ($view) {
            if (Schema::hasTable('categories')) {
                $navCategories = Category::withCount(['products' => fn ($q) => $q->where('status', 'active')])
                    ->orderBy('name')
                    ->get()
                    ->map(function ($cat) {
                        $slug = strtolower($cat->slug);
                        $img = null;

                        if ($cat->image) {
                            $img = asset('storage/' . $cat->image);
                        } elseif (str_contains($slug, 'charging') || str_contains($slug, 'power')) {
                            $img = asset('images/categories/jump.png');
                        } elseif (str_contains($slug, 'display') || str_contains($slug, 'tech')) {
                            $img = asset('images/categories/discovery.png');
                        } elseif (str_contains($slug, 'wearable') || str_contains($slug, 'watch')) {
                            $img = asset('images/categories/infinity-luxe.png');
                        } elseif (str_contains($slug, 'audio') || str_contains($slug, 'sound')) {
                            $img = asset('images/categories/audio-sound.png');
                        } elseif (str_contains($slug, 'gaming') || str_contains($slug, 'gear')) {
                            $img = asset('images/categories/gaming-gear.png');
                        } else {
                            $img = asset('images/categories/jump.png');
                        }

                        $cat->nav_image = $img;
                        $cat->nav_url = route('shop', ['category' => $cat->slug]);

                        return $cat;
                    });

                $view->with('navCategories', $navCategories);
            } else {
                $view->with('navCategories', collect());
            }
        });
    }
}

