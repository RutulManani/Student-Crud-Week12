<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Professor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Student::factory(20)->create();
        Course::factory(10)->create();
        Professor::factory(10)->create();
    }
}