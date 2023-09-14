<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StateSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\ClassSeeders;

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
        ]);
    }
}
