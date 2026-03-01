<?php

namespace Database\Seeders\Berita;

use App\Models\Berita\BeritaTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'id' => (string) Str::uuid(),
                'name' => 'portal berita kalbar',
                'slug' => Str::slug('portal berita kalbar'),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'pki pontianak',
                'slug' => Str::slug('pki pontianak'),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'pt pontianak keras indonesia',
                'slug' => Str::slug('pt pontianak keras indonesia'),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'pontianak keras',
                'slug' => Str::slug('pontianak keras'),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'media online pontianak',
                'slug' => Str::slug('media online pontianak'),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'pontianakkeras id',
                'slug' => Str::slug('pontianakkeras id'),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'berita kriminal',
                'slug' => Str::slug('berita kriminal'),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'peristiwa',
                'slug' => Str::slug('peristiwa'),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'narkotika',
                'slug' => Str::slug('narkotika'),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'hukum',
                'slug' => Str::slug('hukum'),
            ],
        ];

        BeritaTag::insert($datas);
    }
}
