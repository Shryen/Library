<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function create(){
        return view('book.create');
    }
    public function index(){
        return view('book.index',[
            'books' => Book::all(),
        ]);
    }

    public function show(Book $book){
        return view('book.show',[
            'book' => $book
        ]);
    }

    public function store(){
        $attributes = request()->validate([
            'title'=> 'required|max:255',
            'description' => 'required|max:255',
            'year' => 'required|max:4',
            'slug' => '',
        ]);
        $attributes['slug'] = Str::slug($attributes['title'],'-');
        $book = Book::create($attributes);
        $book->save();
        return redirect('/')->with('success', 'Book added to database');
    }
}
