<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeeDetail;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $feetype = [
            ['feetype' => 'OBC'],
            ['feetype' => 'SC'],
            ['feetype' => 'ST'],
            ['feetype' => 'General'],
        ];
        FeeDetail::insert($feetype);
    }
}
