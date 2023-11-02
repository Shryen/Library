<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        return view('admin/index',[
            'books' => Book::all(),
        ]);
    }
    public function create(){
        return view('admin/create');
    }

    public function store(){
        $attributes = request()->validate([
            'title'=> 'required|max:255',
            'description' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|max:4',
            'body' => 'required',
            'price' => 'required',
            'slug' => '',
            'thumbnail' => 'image',
        ]);
        $attributes['slug'] = Str::slug($attributes['title'],'-');
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $book = Book::create($attributes);
        $book->save();
        return redirect('/')->with('success', 'Book added to database');
    }
}
