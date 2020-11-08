<?php

namespace Database\Seeders;

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
        DB::table('edulavels')->insert([
            'name' => 'SD SEDERAJAT',
            'desc' => 'SD/MI',
        ]);
    }
}
