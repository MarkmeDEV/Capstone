<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CartProduct;

class CartProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartProduct1 = new CartProduct();
        $cartProduct1->cart_id = 1;
        $cartProduct1->product_id = 1;
        $cartProduct1->quantity = 3;
        $cartProduct1->save();

        $cartProduct2 = new CartProduct();
        $cartProduct2->cart_id = 1;
        $cartProduct2->product_id = 2;
        $cartProduct2->quantity = 2;
        $cartProduct2->save();

        $cartProduct3 = new CartProduct();
        $cartProduct3->cart_id = 1;
        $cartProduct3->product_id = 3;
        $cartProduct3->quantity = 4;
        $cartProduct3->save();
    }
}
