<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\AdminConfigMissingException;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!config('admin.name')||!config('admin.email')||!config('admin.password')){
            throw new AdminConfigMissingException('В env не заданны данные');
            }


    User::updateOrCreate(
        ['email'=>config('admin.email')],
        [
        'name' => config('admin.name'),
        'password' => Hash::make(config('admin.password')),
        'is_admin' => true,
        'email_verified_at' => now(),

        ]);
        $this->command->info('Админ готов');
    }
}

//User::create([
//            'name' => 'Admin',
//            'email'=>'admin@admin.admin',
//            'password'=> Hash::make('password'),
//            'is_admin'=>true,
//
//        ]);
