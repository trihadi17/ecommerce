<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Model
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahanPokok = [
            [
                'name' => "Kecap Bango",
                'description' => 'Kecap asli yang ada bangonya',
                'categories_id' => 1,
                'price' => 3000,
                'quantity' => 1000,
                'created_at' => now()
            ],
            [
                'name' => "Lifebuoy",
                'description' => 'Sabun anti kuman',
                'categories_id' => 1,
                'price' => 5000,
                'quantity' => 1000,
                'created_at' => now()
            ],
            [
                'name' => "Teh Tarik",
                'description' => 'Teh tarik dari Vrindavan',
                'categories_id' => 1,
                'price' => 10000,
                'quantity' => 500,
                'created_at' => now()
            ],
        ];

        $elektronik = [
            [
                'name' => "Hp Samsung",
                'description' => 'Hp dengan spek terbaik',
                'categories_id' => 2,
                'price' => 5000000,
                'quantity' => 50,
                'created_at' => now()
            ],
            [
                'name' => "Laptop Asus",
                'description' => 'Laptop mendunia',
                'categories_id' => 2,
                'price' => 10000000,
                'quantity' => 50,
                'created_at' => now()
            ],
        ];

        $sepatu = [
            [
                'name' => "Adidas",
                'description' => 'Ini adalah septau Adidas Terbaru',
                'categories_id' => 3,
                'price' => 120000,
                'quantity' => 100,
                'created_at' => now()
            ],
            [
                'name' => "Puma",
                'description' => 'Ini adalah sepatu Nike Tercanggih',
                'categories_id' => 3,
                'price' => 100000,
                'quantity' => 100,
                'created_at' => now()
            ],
            [
                'name' => "Nike",
                'description' => 'Ini adalah septau Adidas Terbaik Sepanjang Masa',
                'categories_id' => 3,
                'price' => 150000,
                'quantity' => 100,
                'created_at' => now()
            ],
        ];

        Product::insert($bahanPokok);
        Product::insert($elektronik);
        Product::insert($sepatu);
    }
}
