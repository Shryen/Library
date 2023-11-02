<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(){
        return view('book.index',[
            'books' => Book::latest()->filter(request(['search']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Book $book){
        return view('book.show',[
            'book' => $book
        ]);
    }
}
