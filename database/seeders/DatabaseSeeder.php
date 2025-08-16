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

        $professors = Professor::factory(10)->create();
        $courses = Course::factory(10)->create();
        $students = Student::factory(20)->create();

        $courses->each(function ($course) use ($professors) {
            $course->professor()->associate($professors->random())->save();
        });

        $students->each(function ($student) use ($courses) {
            $student->courses()->attach(
                $courses->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}