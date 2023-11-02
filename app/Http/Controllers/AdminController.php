<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin/index',[
            'books' => Book::all(),
        ]);
    }
}
