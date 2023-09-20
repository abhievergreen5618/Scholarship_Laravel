<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ScholarshipList;

class ScholarshipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            ["name" => "type1"],
            ["name" => "type2"],
            ["name" => "type3"],
            ["name" => "type4"],
        ];
        ScholarshipList::insert($type);
    }
}
