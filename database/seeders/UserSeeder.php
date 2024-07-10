<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = 
        [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin'
            ],

            [
                'name' => 'Gudang',
                'email' => 'gudang@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'gudang'
            ]
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
