<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 20; $i++) {
            $project = new Project();
            $project->title = $faker->words(3, true);
            $project->description = $faker->text(400);
            $project->screenshot_site = $faker->imageUrl(640, 480, 'Develop', true, 'of');
            $project->client_name = $faker->company;
            $project->budget = $faker->randomFloat(2, 50, 400);
            $project->url = $faker->url;
            $project->slug = Str::of($project->title)->slug('-');
            $project->save();
        }
    }
}
