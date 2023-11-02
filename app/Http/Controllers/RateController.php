<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function store(Book $book)
    {
        request()->validate([
            'rate' => 'required',
        ]);

        $book->rates()->create([
            //automatically set the post_id
            'user_id' => request()->user()->id,
            'rate' => request('rate'),
        ]);
        return back()->with('success',"Book rated");
    }
}
