<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EdulevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edulevels')->insert([ //seperti array
            [
                'name' => 'SD sederajat',
                'desc' => 'SD / MI',
            ],
            [
                'name' => 'SMP sederajat',
                'desc' => 'SMP / MTS',
            ]
        ]);
    }
}