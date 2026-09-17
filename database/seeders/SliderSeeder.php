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
        $faker = \Faker\Factory::create();
        $colors = ['FF5733', '33FF57', '3357FF', 'F3FF33', 'FF33F3'];

        for ($i = 0; $i < 4; $i++) {
            $title = $faker->sentence();
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="400">'
                . '<rect width="100%" height="100%" fill="#' . $colors[$i] . '"/>'
                . '<text x="50%" y="50%" fill="#FFFFFF" font-size="60" text-anchor="middle">' .$title . '</text>'
                . '</svg>';
            $filePath = 'slider/' . $i . '.svg';
            Storage::disk('public')->put("slider/" . $i . ".svg", $svg);
            slider::create([
                'Zagalovok' => $title,
                'Description' => $faker->paragraph(),
                'Active' => (bool)rand(0, 1),
                'Image' => $filePath,
            ]);
        }
    }
}
