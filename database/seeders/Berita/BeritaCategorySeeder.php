<?php

namespace Database\Seeders\Berita;

use App\Models\Berita\BeritaCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'id' => (string)Str::uuid(),
                'name'  => 'Berita',
                'slug'  => Str::slug('Berita')
            ],
            [
                'id' => (string)Str::uuid(),
                'name'  => 'Kriminal',
                'slug'  => Str::slug('Kriminal')
            ],
            [
                'id' => (string)Str::uuid(),
                'name'  => 'Peristiwa',
                'slug'  => Str::slug('Peristiwa')
            ],
            [
                'id' => (string)Str::uuid(),
                'name'  => 'Narkotika',
                'slug'  => Str::slug('Narkotika')
            ],
            [
                'id' => (string)Str::uuid(),
                'name'  => 'Hukum',
                'slug'  => Str::slug('Hukum')
            ],
        ];

        BeritaCategory::insert($datas);
    }
}
