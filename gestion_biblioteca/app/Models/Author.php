<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
