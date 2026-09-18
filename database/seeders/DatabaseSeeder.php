<?php

namespace Database\Seeders;

use App\Exceptions\AdminConfigMissingException;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try{
            $this->call(AdminSeeder::class);
        }catch (AdminConfigMissingException $e){
            $this->command->error($e->getMessage());
        }

        $this->call([
            ProductCategorySeeder::class,
            UserSeeder::class,
            SliderSeeder::class,

        ]);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
