<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = new Products();
        $product1->name = 'Produce Title 1';
        $product1->description = 'Produce Description 1';
        $product1->quantity = 50;
        $product1->price = 120;
        $product1->save();

        $product1 = new Products();
        $product1->name = 'Produce Title 2';
        $product1->description = 'Produce Description 2';
        $product1->quantity = 50;
        $product1->price = 150;
        $product1->save();

        $product1 = new Products();
        $product1->name = 'Produce Title 3';
        $product1->description = 'Produce Description 3';
        $product1->quantity = 25;
        $product1->price = 220;
        $product1->save();

        $product1 = new Products();
        $product1->name = 'Produce Title 4';
        $product1->description = 'Produce Description 4';
        $product1->quantity = 23;
        $product1->price = 114;
        $product1->save();

        $product1 = new Products();
        $product1->name = 'Produce Title 5';
        $product1->description = 'Produce Description 5';
        $product1->quantity = 124;
        $product1->price = 450;
        $product1->save();
    }
}
