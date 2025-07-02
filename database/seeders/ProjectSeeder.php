<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'Plantify',
            'description' => 'A mobile app to simplify plant care with reminders and categorization.',
            'screenshot' => 'uploads/screenshots/plantify.png',
            'github_link' => 'https://github.com/username/plantify',
            'created_at' => '2025-05-01',
        ]);

        Project::create([
            'title' => 'TaskMaster',
            'description' => 'A project management tool with intuitive kanban boards.',
            'screenshot' => 'uploads/screenshots/taskmaster.png',
            'github_link' => 'https://github.com/username/taskmaster',
            'created_at' => '2025-06-01',
        ]);
    }
}
