<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Warehouse'],
            ['name' => 'In Transit'],
            ['name' => 'Delivered'],
        ];
        DB::table('status')->insert($data);
    }
}
