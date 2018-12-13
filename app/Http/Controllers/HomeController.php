<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $books = Book::UserBooks($id)->get();
        $main_title = 'Dashboard';

        return view('home', compact('books', 'id', 'main_title'));
    }
}
