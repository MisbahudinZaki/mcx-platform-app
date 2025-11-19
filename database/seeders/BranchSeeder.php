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
         DB::table('branches')->insert([
            [
                'id'       => 1,
                'name'     => 'Mandiri Singapore',
                'code'     => 'SG',
                'country'  => 'Singapore',
                'city'     => 'Singapore',
            ],
            [
                'id'       => 2,
                'name'     => 'Mandiri Shanghai',
                'code'     => 'SH',
                'country'  => 'China',
                'city'     => 'Shanghai',
            ],
            [
                'id'       => 3,
                'name'     => 'Mandiri Hong Kong',
                'code'     => 'HK',
                'country'  => 'China',
                'city'     => 'Hong Kong',
            ],
            [
                'id'       => 4,
                'name'     => 'Mandiri Cayman',
                'code'     => 'CYM',
                'country'  => 'Cayman',
                'city'     => 'Georgetown',
            ],
            [
                'id'       => 5,
                'name'     => 'Mandiri London',
                'code'     => 'LDN',
                'country'  => 'UK',
                'city'     => 'London',
            ],
            [
                'id'       => 6,
                'name'     => 'Mandiri Dili',
                'code'     => 'DIL',
                'country'  => 'Timor-Leste',
                'city'     => 'Dili',
            ],
        ]);
    }
}
