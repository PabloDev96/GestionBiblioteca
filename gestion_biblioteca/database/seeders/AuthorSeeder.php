<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            ['name' => 'F. Scott Fitzgerald', 'country' => 'USA'],
            ['name' => 'Andrzej Sapkowski', 'country' => 'Poland'],
            ['name' => 'George R.R. Martin', 'country' => 'USA'],
            ['name' => 'J.R.R. Tolkien', 'country' => 'UK'],
        ]);
    }
}
