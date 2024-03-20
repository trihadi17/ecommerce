<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Model
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Bahan Pokok',
                'created_at' => now()
            ],
            [
                'name' => 'Elektronik',
                'created_at' => now()
            ],
            [
                'name' => 'Sepatu',
                'created_at' => now()
            ],
    ];
        
        Category::insert($data);
    }
}
