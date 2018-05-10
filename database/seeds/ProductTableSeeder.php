<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<4; $i++) {
            $product = new Product([
                'imagePath' => 'https://mebel-7ja.ua/files/products/Karolina_19.300x300.jpg?3b742b036a22459b4f4e700cb6f59010',
                'title' => 'Table',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt soluta corrupti totam,
          hic quidem voluptatibus aliquam pariatur nobis doloribus ab repellendus voluptatum, quae quo est temporibus cum,
          nesciunt ad. Laboriosam.',
                'price' => 3500
            ]);
            $product->save();
        }
    }
}
