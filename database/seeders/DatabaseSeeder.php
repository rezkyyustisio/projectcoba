<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $sourcePath      = public_path('template/icon_dark.png');
        $destinationPath = storage_path('app/public/images/user/super_admin.png');
        File::copy($sourcePath, $destinationPath);

        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis laboriosam ad beatae itaque ea non placeat officia ipsum praesentium! Ullam?',
            'image' => 'images/user/super_admin.png',
        ]);

        // $this->call([
        //     SettingSeeder::class,
        //     Berita\BeritaCategorySeeder::class,
        //     Berita\BeritaSeeder::class,
        //     Berita\BeritaTagSeeder::class,
        // ]);
    }
}
