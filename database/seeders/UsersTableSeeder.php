<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Model
use App\Models\User;

// Hash
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'first_name' => 'Trihadi',
                'last_name' => 'Putra',
                'email' => 'trihadi17@gmail.com',
                'password' => Hash::make('password123'),
                'address' => 'Jl. Serayu Gg. Serayu II',
                'provinces' => 'Riau',
                'regencies' => 'Pekanbaru',
                'zip_code' => '28292',
                'country' => 'Indonesia',
                'phone_number' => '0895603075970'
            ],
        
            [
                'first_name' => 'Indro',
                'last_name' => 'Kustiawan',
                'email' => 'indrokustiawan@gmail.com',
                'password' => Hash::make('password123'),
                'address' => 'Jl. Delima',
                'provinces' => 'Riau',
                'regencies' => 'Pekanbaru',
                'zip_code' => '28392',
                'country' => 'Indonesia',
                'phone_number' => '081234550987'
            ],
        ];

        User::insert($user);
    }
}
