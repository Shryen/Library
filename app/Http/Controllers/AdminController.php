<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index', [
            'books' => Book::all(),
        ]);
    }
    public function create()
    {
        return view('admin/create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required|max:255|unique',
            'description' => 'required|max:255',
            'author' => 'required|max:255',
            'year' => 'required|max:4',
            'body' => 'required',
            'price' => 'required',
            'slug' => '',
            'thumbnail' => 'image',
        ]);
        $attributes['slug'] = Str::slug($attributes['title'], '-');
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $book = Book::create($attributes);
        $book->save();
        return redirect('/')->with('success', 'Book added to database');
    }

    public function edit(Book $book){
        return view('admin/edit',[
            'book' => $book
        ]);
    }

    public function update(Book $book)
    {
        $attributes = request()->validate([
            'title' => ['required', 'unique', 'max:255', Rule::unique('books', 'title')->ignore($book->id)],
            'description' => 'required|max:255',
            'body' => 'required',
            'price' => 'required',
            'thumbnail' => 'image'
        ]);
        $attributes['slug'] = Str::slug($attributes['title'], '-');
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $book->update($attributes);
        return back()->with('success', 'Book updated');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return back()->with('success', 'Book deleted');
    }
}
