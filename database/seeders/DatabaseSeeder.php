<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StateSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\ClassSeeders;
use Database\Seeders\FeeSeeder;
use Database\Seeders\ScholarshipTypeSeeder;
use Database\Seeders\SessionSeeder;
use Database\Seeders\OptionsSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StateSeeder::class,
            DistrictSeeder::class,
            ClassSeeders::class,
            FeeSeeder::class,
            ScholarshipTypeSeeder::class,
            SubjectsSeeder::class,
            SessionSeeder::class,
            OptionsSeeder::class,
        ]);
    }
}
