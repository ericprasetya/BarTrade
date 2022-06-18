<?php

namespace Database\Seeders;

use App\Models\Product;
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
        User::create([
            'name' => 'Eric Prasetya',
            'username' => 'ericprasetya',
            'email' => 'eric.sentosa888@gmail.com',
            'phone' => '62888888888',
            'password' => bcrypt('12345')
        ]);
        User::factory(3)->create();

        ProductCategory::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);
        ProductCategory::create([
            'name' => 'Alat Dapur',
            'slug' => 'alat-dapur',
        ]);
        ProductCategory::create([
            'name' => 'Alat Olahraga',
            'slug' => 'alat-olahraga'
        ]); 
        ProductCategory::create([
            'name' => 'Fashion',
            'slug' => 'fashion'
        ]);
        
        Product::factory(10)->create();
    }
}
