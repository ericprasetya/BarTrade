<?php

namespace Database\Seeders;

use App\Models\Barter;
use App\Models\Courier;
use App\Models\Payment;
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
            'name' => 'Electronic',
            'slug' => 'electronic',
        ]);
        ProductCategory::create([
            'name' => 'Kitchen Set',
            'slug' => 'kitchen-set',
        ]);
        ProductCategory::create([
            'name' => 'Sports Equipment',
            'slug' => 'sports-equipment'
        ]); 
        ProductCategory::create([
            'name' => 'Fashion',
            'slug' => 'fashion'
        ]);
        
        Product::factory(20)->create();

        Courier::create([
            'name' => 'JNE',
            'fee' => 20000
        ]);

        Courier::create([
            'name' => 'J&T',
            'fee' => 20000
        ]);

        Payment::create([
            'name' => 'OVO'
        ]);

        Payment::create([
            'name' => 'GoPay'
        ]);

        Payment::create([
            'name' => 'Bank Transfer'
        ]);

        Barter::create([
            'seller_product_id' => '1',
            'buyer_product_id' => '3',
            'payment_id' => '1',
            'courier_id' => '1',
            'type' => 'Full Barter',
            'address' => 'jalan patimura nomor 20, Denpasar',
        ]);
    }
}
