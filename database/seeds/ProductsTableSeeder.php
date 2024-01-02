<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the products table
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'price' => 9.99,
                'description' => 'Description for Product 1.',
            ],
            [
                'name' => 'Product 2',
                'price' => 19.99,
                'description' => 'Description for Product 2.',
            ],
            [
                'name' => 'Product 3',
                'price' => 29.99,
                'description' => 'Description for Product 3.',
            ],
            [
                'name' => 'Product 4',
                'price' => 39.99,
                'description' => 'Description for Product 4.',
            ],
            [
                'name' => 'Product 5',
                'price' => 49.99,
                'description' => 'Description for Product 5.',
            ],
            [
                'name' => 'Product 6',
                'price' => 59.99,
                'description' => 'Description for Product 6.',
            ],
            [
                'name' => 'Product 7',
                'price' => 69.99,
                'description' => 'Description for Product 7.',
            ],
            [
                'name' => 'Product 8',
                'price' => 79.99,
                'description' => 'Description for Product 8.',
            ],
            [
                'name' => 'Product 9',
                'price' => 89.99,
                'description' => 'Description for Product 9.',
            ],
            [
                'name' => 'Product 10',
                'price' => 99.99,
                'description' => 'Description for Product 10.',
            ],
            // Add more products as needed
        ]);
    }
}
