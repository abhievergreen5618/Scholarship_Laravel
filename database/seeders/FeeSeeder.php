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
            ['feetype' => 'OBC','feecode'=>'obc','fee' => '800'],
            ['feetype' => 'SC','feecode'=>'sc','fee' => '500'],
            ['feetype' => 'ST','feecode'=>'st','fee' => '500'],
            ['feetype' => 'General','feecode'=>'general','fee' => '1500'],
            ['feetype' => 'Physical Challenged','feecode'=>'physicallychallenged','fee' => '200'],
        ];
        FeeDetail::insert($fee);
    }
}
