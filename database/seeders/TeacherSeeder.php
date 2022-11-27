<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacher')->insert([
            [
                'name' => 'Katie',
                'is_active' => 1
            ],
            [
                'name' => 'Max',
                'is_active' => 1
            ]
        ]);
    }
}
