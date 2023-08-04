<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DistrictModel;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            ['name' => 'Kullu', 'statecode' => 'HP'],
            ['name' => 'Mandi', 'statecode' => 'HP'],
            ['name' => 'Bilaspur', 'statecode' => 'HP'],
            ['name' => 'Mohali', 'statecode' => 'PB'],
            ['name' => 'Amritsar', 'statecode' => 'PB'],
        ];
        DistrictModel::insert($districts);
    }
}
