<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Paginates;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        Storage::deleteDirectory('image');
        Storage::makeDirectory('image');
        Storage::deleteDirectory('Slider');
        Storage::makeDirectory('Slider');
        Storage::deleteDirectory('files');
        Storage::makeDirectory('files');

        // \App\Models\User::factory(10)->create();
        $user= User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2a$10$7oMxkBuQ0PpbVxpJl0ufNerj0TTuZmRxrD76LlyKCaMCh8bpZqVS2',   //admin
        ]);

        Category::factory(5)->create();
        Tag::factory(6)->create();
        $this->call([
            AyudamosCrecerSeeder::class,
            SecondBlockSeeder::class,
            SliderAyudamosCrecerSeeder::class,
            SliderPrincipalSeeder::class,
            TeamHumanSeeder::class,
            ThirdBlockSeeder::class,
            ItemsNuestroServicioSeeder::class,
            PaginaBlockSeeder::class,
            PostSeeder::class,

        ]);
    }
}
