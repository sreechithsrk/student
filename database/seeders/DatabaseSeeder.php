<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TeacherSeeder;
use Database\Seeders\TermSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TeacherSeeder::class);
        $this->call(TermSeeder::class);
    }
}
