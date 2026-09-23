<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\slider;
use Illuminate\Support\Facades\Storage;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */

    public function run(): void
    {   slider::truncate();
        $faker = \Faker\Factory::create('ru_RU');
        Storage::disk('public')->deleteDirectory('slider');

        for ($i = 0; $i < 10; $i++) {
            $colors = fake()->hexColor();
            $title = $faker->text(200);
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="400">'
                . '<rect width="100%" height="100%" fill="' . $colors . '"/>'
                . '</svg>';
            $filePath = 'slider/' . $i . '.svg';
            Storage::disk('public')->put("slider/" . $i . ".svg", $svg);
            slider::create([
                'Zagalovok' => $title,
                'Description' => $faker->text(200),
                'Active' => (bool)rand(0, 1),
                'Image' => $filePath,
            ]);
        }
    }
}
