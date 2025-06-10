<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class BooksTableSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener los autores por nombre
        $fitzgerald = Author::where('name', 'F. Scott Fitzgerald')->first();
        $sapkowski  = Author::where('name', 'Andrzej Sapkowski')->first();
        $martin     = Author::where('name', 'George R.R. Martin')->first();
        $tolkien    = Author::where('name', 'J.R.R. Tolkien')->first();

        DB::table('books')->insert([
            [
                'title' => 'El Gran Gatsby',
                'published_year' => 1925,
                'author_id' => $fitzgerald->id
            ],
            [
                'title' => 'El último deseo',
                'published_year' => 1993,
                'author_id' => $sapkowski->id
            ],
            [
                'title' => 'Juego de Tronos',
                'published_year' => 1996,
                'author_id' => $martin->id
            ],
            [
                'title' => 'La comunidad del anillo',
                'published_year' => 1954,
                'author_id' => $tolkien->id
            ]
        ]);
    }
}