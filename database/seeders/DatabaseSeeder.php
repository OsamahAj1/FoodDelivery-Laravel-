<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cart;
use App\Models\Food;
use App\Models\OldOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        User::truncate();
        Food::truncate();
        OldOrder::truncate();
        Order::truncate();
        Cart::truncate();
        DB::statement("SET foreign_key_checks=1");

        $client1 = User::create([
            'name' => 'osamah',
            'password' => 'password',
            'email' => 'osamah@example.com',
            'rule' => 'admin',
            'address' => 'address',
            'number' => '+966123456789',
        ]);

        $client2 = User::create([
            'name' => 'foo',
            'password' => 'password',
            'email' => 'foo@example.com',
            'rule' => 'client',
            'address' => 'address',
            'number' => '+966123456789',
        ]);

        $restaurant_1 = User::create([
            'name' => 'restaurant_1',
            'password' => 'password',
            'image' => 'images/restaurant_1.png',
            'email' => 'restaurant_1@example.com',
            'rule' => 'restaurant',
            'des' => 'good restaurant',
            'address' => 'address',
            'number' => '+966123456789',
        ]);

        $restaurant_2 = User::create([
            'name' => 'restaurant_2',
            'password' => 'password',
            'image' => 'images/restaurant_2.png',
            'email' => 'restaurant_2@example.com',
            'des' => 'good restaurant',
            'rule' => 'restaurant',
            'address' => 'address',
            'number' => '+966123456789',
        ]);

        $restaurant_3 = User::create([
            'name' => 'restaurant_3',
            'password' => 'password',
            'image' => 'images/restaurant_3.png',
            'email' => 'restaurant_3@example.com',
            'des' => 'good restaurant',
            'rule' => 'restaurant',
            'address' => 'address',
            'number' => '+966123456789',
        ]);

        $delivery1 = User::create([
            'name' => 'delivery',
            'password' => 'password',
            'image' => 'images/delivery_1.png',
           'email' => 'delivery@example.com',
            'rule' => 'delivery',
            'car' => 'car',
            'number' => '+966123456789',
        ]);

        $delivery2 = User::create([
            'name' => 'delivery_2',
            'password' => 'password',
            'image' => 'images/delivery_2.png',
           'email' => 'delivery_2@example.com',
            'rule' => 'delivery',
            'car' => 'car',
            'number' => '+966123456789',
        ]);

        Food::create([
            'restaurant_id' => $restaurant_1->id,
            'name'=> 'burger',
            'image' => 'food_images/burger.png',
            'des' => 'good burger',
            'price' => 4.0,
        ]);

        Food::create([
            'restaurant_id' => $restaurant_1->id,
            'name'=> 'water',
            'image' => 'food_images/water.png',
            'des' => 'good water',
            'price' => 0.5
        ]);

        Food::create([
            'restaurant_id' => $restaurant_1->id,
            'name'=> 'fries',
            'image' => 'food_images/fries.png',
            'des' => 'good fries',
            'price' => 2.0,
        ]);

        Food::create([
            'restaurant_id' => $restaurant_2->id,
            'name'=> 'pizza',
            'image' => 'food_images/pizza.png',
            'des' => 'good pizza',
            'price' => 6.0,
        ]);

        Food::create([
            'restaurant_id' => $restaurant_2->id,
            'name'=> 'spaghetti',
            'image' => 'food_images/spaghetti.png',
            'des' => 'good spaghetti',
            'price' => 4.0,
        ]);

        Food::create([
            'restaurant_id' => $restaurant_2->id,
            'name'=> 'soda',
            'image' => 'food_images/soda.png',
            'des' => 'good soda',
            'price' => 1.0,
        ]);

        Food::create([
            'restaurant_id' => $restaurant_3->id,
            'name'=> 'coffee',
            'image' => 'food_images/coffee.png',
            'des' => 'good coffee',
            'price' => 2.0,
        ]);

        Food::create([
            'restaurant_id' => $restaurant_3->id,
            'name'=> 'tea',
            'image' => 'food_images/tea.png',
            'des' => 'good tea',
            'price' => 1.0,
        ]);

        Food::create([
            'restaurant_id' => $restaurant_3->id,
            'name'=> 'chocolate',
            'image' => 'food_images/chocolate.png',
            'des' => 'good chocolate',
            'price' => 0.5,
        ]);
    }
}
