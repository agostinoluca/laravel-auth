<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::all()->pluck('id')->all();
        $technologies = Technology::all()->pluck('id')->all();

        for ($i = 0; $i < 5; $i++) {
            $project = new Project();
            $project->type_id = $faker->randomElement($types);
            $project->title = $faker->words(3, true);
            $project->description = $faker->text(400);
            $project->screenshot_site = $faker->imageUrl(640, 480, 'Develop', true, 'of');
            $project->client_name = $faker->company;
            $project->budget = $faker->randomFloat(2, 50, 400);
            $project->url = $faker->url;
            $project->slug = Str::of($project->title)->slug('-');
            $project->save();
            $randomTechnologies = $faker->randomElements($technologies, rand(1, 7));
            $project->technologies()->attach($randomTechnologies);
        }
    }
}
