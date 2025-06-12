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

    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required|string|',
                'author_id' => 'required|integer',
                'published_year' => 'required|integer'
            ]);
            
            $book = new Book();
            $book->title = $request->input('title');
            $book->author_id = $request->input('author_id');
            $book->published_year = $request->input('published_year');
            $book->save();
            return response()->json($book, 201);
        }catch(\Exception $e){
            return response()->json(['error' => 'Error al guardar el libro: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $book = Book::find($id);

            if (!$book){
                return response()->json(['error' => 'Libro no encontrado'], 404);
            }
            else{                            
            $book->delete();
            }
            
            return response()->json(['message' => 'Libro eliminado correctamente'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el libro: ' . $e->getMessage()], 500);
        }
    }
}
