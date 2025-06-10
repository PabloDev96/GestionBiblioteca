<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class ApiController extends Controller
{
    public function index()
    {
        $libros = Book::with('author')->get();
        return response()->json($libros);
    }
}
