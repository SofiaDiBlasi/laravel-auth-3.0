<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $projects = [
            [
                "name" => "Portale Gattini",
                "description" => "Un portale verso il mondo dei gattini",
                "link" => "https://doctorvet.it/wp-content/uploads/2019/11/the-lucky-neko-rplhB9mYF48-unsplash.jpg"
            ],
            [
                "name" => "Portale Canini",
                "description" => "Un portale verso il mondo dei canini",
                "link" => "https://fra1.digitaloceanspaces.com/wgspace/quattrozampe/2019/05/Group-of-four-white-Samoyed-puppies-on-black-background-465505569_2122x1415-1024x683.jpeg"
            ],
            [
                "name" => "Portale Coniglini",
                "description" => "Un portale verso il mondo dei coniglini",
                "link" => "https://www.ideegreen.it/wp-content/uploads/2019/03/Coniglietto-domestico.jpg"
            ],
        ];

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->name = $project['name'];
            $newProject->description = $project['description'];
            $newProject->link = $project['link'];
            $newProject->save();
        }
    }
}
