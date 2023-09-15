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
        $fee = [
            ['feetype' => 'OBC','fee' => '150'],
            ['feetype' => 'SC','fee' => '100'],
            ['feetype' => 'ST','fee' => '70'],
            ['feetype' => 'General','fee' => '170'],
        ];
        FeeDetail::insert($fee);
    }
}
