<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cart;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart1 = new Cart();
        $cart1->user_id = 1;
        $cart1->save();

        $cart2 = new Cart();
        $cart2->user_id = 2;
        $cart2->save();

        $cart3 = new Cart();
        $cart3->user_id = 3;
        $cart3->save();
    }
}
