<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::created([
            'name' => 'Eric Prasetya',
            'username' => 'ericprasetya',
            'email' => 'eric.sentosa888@gmail.com',
            'password' => bcrypt('12345')
        ]);
        User::factory(3)->create();

        ProductCategory::create([
            'name' => 'Elektronik'
        ]);
        ProductCategory::create([
            'name' => 'Alat Dapur'
        ]);
        ProductCategory::create([
            'name' => 'Alat Olahraga'
        ]);
        ProductCategory::create([
            'name' => 'Fashion'
        ]);
    }
}
