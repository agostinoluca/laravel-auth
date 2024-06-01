<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies =
            [
                'PHP',
                'SQL',
                'Javascript',
                'Laravel',
                'Vue.js',
                'Node.js',
                'SASS'
            ];

        foreach ($technologies as $tech) {
            $newTech = new Technology();
            $newTech->name = $tech;
            $newTech->slug = Str::of($newTech->name)->slug('-');
            $newTech->save();
        }
    }
}
