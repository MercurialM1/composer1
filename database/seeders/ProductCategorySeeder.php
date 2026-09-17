<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


   public function run(): void
   {

       $categories = [
           ['name' => 'Ноутбуки'],
           ['name' => 'Смартфоны'],
           ['name' => 'Аксессуары'],
       ];
       Category::create([
           'name' => $categories[rand(0,2)]['name'],
           'sort' => rand(1,5),
           'is_active' => (bool)rand(0,1),
       ]);
   }
}
