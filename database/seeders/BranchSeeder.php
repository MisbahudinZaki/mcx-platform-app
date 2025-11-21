<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $branches = [
            [
                'name' => 'Bank Mandiri Singapore',
                'status' => 'Available',
                'available_nostro' => 30800000,
                'tf_exposure' => 10800000,
                'suggested_rate' => 4.60,
                'cof' => 7.25,
                'cof_margin' => 0.5,
                'remark' => 'Recommendation',
                'match_confidence' => 90,
            ],
            [
                'name' => 'Bank Mandiri Shanghai',
                'status' => 'Available',
                'available_nostro' => 27300000,
                'tf_exposure' => 10800000,
                'suggested_rate' => 4.60,
                'cof' => 7.30,
                'cof_margin' => 1.0,
                'remark' => 'Best Maturity Match',
                'match_confidence' => 85,
            ],
            [
                'name' => 'Bank Mandiri Hong Kong',
                'status' => 'Available',
                'available_nostro' => 45300000,
                'tf_exposure' => 10800000,
                'suggested_rate' => 4.60,
                'cof' => 7.30,
                'cof_margin' => 2.0,
                'remark' => 'Balanced Option',
                'match_confidence' => 70,
            ],
            [
                'name' => 'Bank Mandiri Europe Limited',
                'status' => 'Available',
                'available_nostro' => 50300000,
                'tf_exposure' => 10800000,
                'suggested_rate' => 4.60,
                'cof' => 7.30,
                'cof_margin' => 2.5,
                'remark' => null,
                'match_confidence' => 50,
            ],
            [
                'name' => 'Bank Mandiri Dili',
                'status' => 'Available',
                'available_nostro' => 40000000,
                'tf_exposure' => 10800000,
                'suggested_rate' => 4.60,
                'cof' => 7.30,
                'cof_margin' => 3.0,
                'remark' => null,
                'match_confidence' => 40,
            ],
            [
                'name' => 'Bank Mandiri Cayman',
                'status' => 'Cut Off',
                'available_nostro' => 18000000,
                'tf_exposure' => 10800000,
                'suggested_rate' => 4.60,
                'cof' => 7.30,
                'cof_margin' => 4.0,
                'remark' => null,
                'match_confidence' => 25,
            ],
        ];

        foreach ($branches as $branch) {
            DB::table('branches')->updateOrInsert(
                ['name' => $branch['name']],
                $branch
            );
        }

    }
}
