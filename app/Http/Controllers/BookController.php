<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(){
        return view('book/create');
    }

    public function store(){
        $attributes = request()->validate([
            'title'=> 'required|max:255',
            'description' => 'required|max:255',
            'year' => 'required|max:4',
        ]);
        $book = Book::create($attributes);
        $book->save();
        return redirect('/')->with('success', 'Book added to database');
    }
}
