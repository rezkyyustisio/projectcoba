<?php

namespace App\Providers;

use App\Models\Berita\BeritaCategory;
use Illuminate\Support\ServiceProvider;

class BeritaCategoryServiceProvider extends ServiceProvider
{
    protected $settingsCache = null; // Cache di level aplikasi (memori)

    public function boot()
    {
        $datas = BeritaCategory::orderBy('name')->get();
        view()->share('providerCategories', $datas);
    }
}
