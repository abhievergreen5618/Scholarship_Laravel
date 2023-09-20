<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectsSeeder extends Seeder
{
    public function run()
    {
        $subject = Subject::create([
            "name" => "Math",
            "classes" => [5,6,7,8,9]
        ]);
        $subject->classes()->sync([5,6,7,8,9,10]);
        
        $subject = Subject::create([
            "name" => "English",
            "classes" => [3,4,5,6,7,8]
        ]);
        $subject->classes()->sync([3,4,5,6,7,8,9]);
        
        $subject = Subject::create([
            "name" => "Hindi",
            "classes" => [1.2,3,4,5,6,7,8,9]
        ]);
        $subject->classes()->sync([1.2,3,4,5,6,7,8,9]);
    }
}
