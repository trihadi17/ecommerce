<?php

namespace Database\Seeders;

use App\Models\ProductGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductGalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahanPokok = [
            // KECAP
            [
                'photos' => 'kecapbango1.png',
                'products_id' => 1,
                'created_at' => now()
            ],
            [
                'photos' => 'kecapbango2.png',
                'products_id' => 1,
                'created_at' => now()
            ],

            // LIFEBUOY
            [
                'photos' => 'lifebuoy1.png',
                'products_id' => 2,
                'created_at' => now()
            ],
            [
                'photos' => 'lifebuoy2.png',
                'products_id' => 2,
                'created_at' => now()
            ],
    
            // Teh Tarik
            [
                'photos' => 'tehtarik.png',
                'products_id' => 3,
                'created_at' => now()
            ],
        ];

        $elektronik = [
            // HP
            [
                'photos' => 'samsung1.png',
                'products_id' => 4,
                'created_at' => now()
            ],
            [
                'photos' => 'samsung2.png',
                'products_id' => 4,
                'created_at' => now()
            ],

            // LAPTOP
            [
                'photos' => 'laptop1.png',
                'products_id' => 5,
                'created_at' => now()
            ],
            [
                'photos' => 'laptop2.png',
                'products_id' => 5,
                'created_at' => now()
            ],

        ];

        $sepatu = [
            // ADIDAS
            [
                'photos' => 'adidas1.png',
                'products_id' => 6,
                'created_at' => now()
            ],
            [
                'photos' => 'adidas2.png',
                'products_id' => 6,
                'created_at' => now()
            ],

            // PUMA
            [
                'photos' => 'puma1.png',
                'products_id' => 7,
                'created_at' => now()
            ],
            [
                'photos' => 'puma2.png',
                'products_id' => 7,
                'created_at' => now()
            ],

            // NIKE
            [
                'photos' => 'nike1.png',
                'products_id' => 8,
                'created_at' => now()
            ],
            [
                'photos' => 'nike2.png',
                'products_id' => 8,
                'created_at' => now()
            ],
        ];

        ProductGallery::insert($bahanPokok);
        ProductGallery::insert($elektronik);
        ProductGallery::insert($sepatu);
    }
}
