<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = fake('ru_RU');

        for ($i = 0; $i < 10; $i++) {
            User::firstOrcreate([
                'name' => $faker->name(),
                'email' => $faker->unique()->email(),
                'password' => Hash::make('password'),
                'is_admin' => false,
        ]);
        }
    }
}


