<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types =
            [
                'Static Website',
                'Dynamic Website',
                'Single Page Application',
                'Progressive Web App',
                'Backend API',
                'Full-Stack Application',
                'Content Management System',
                'E-commerce Platform',
                'Task Management Tool',
                'Real-time Application'
            ];

        foreach ($types as $singleType) {
            $type = new Type();
            $type->name = $singleType;
            $type->slug = Str::of($type->name)->slug('-');
            $type->save();
        }
    }
}
