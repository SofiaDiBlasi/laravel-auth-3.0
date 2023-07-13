<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $technologies = [
                [
                    "name" => "Vue",
                ],
                [
                    "name" => "PHP",
                ],
                [
                    "name" => "Vite",
                ],
            ];

            foreach ($technologies as $technology) {
                $newTechnology = new Technology();
                $newTechnology->name = $technology['name'];
                $newTechnology->save();
            }
        }
    }
}
