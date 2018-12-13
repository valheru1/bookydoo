<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Book;
use App\Chapter;
class BookController extends Controller
{
    public function index()
    {
    	$id = Auth::user()->id;
        $books = Book::UserBooks($id)->get();
        $main_title = 'Your books';
        return view('books.index', compact('books', 'id', 'main_title'));
    }

    public function show($id)
    {

    }

    public function create()
    {
    	$id = Auth::user()->id;
        $main_title = 'Add new book';
    	return view('books.create', compact('id', 'main_title'));

    }



    public function store()
    {
       	$this->validate(request(), [
       			'title' 		=> 'required|min:2|max:50|unique:books|string',
       			'description' 	=> 'required|min:50|max:1000|unique:books|string'
       		]);

       	$book = new Book();

        $book->title = request('title');
        $book->description = request('description');
        $book->author_id = request('author_id');

        if(request('comedy')==null) { $book->comedy = 0; } else { $book->comedy = 1; }
        if(request('fantasy')==null) { $book->fantasy = 0; } else { $book->fantasy = 1; }
        if(request('for_kids')==null) { $book->for_kids = 0; } else { $book->for_kids = 1; }
        if(request('history')==null) { $book->history = 0; } else { $book->history = 1; }
        if(request('moral')==null) { $book->moral = 0; } else { $book->moral = 1; }
        if(request('philosophy')==null) { $book->philosophy = 0; } else { $book->philosophy = 1; }
        if(request('religious')==null) { $book->religious = 0; } else { $book->religious = 1; }
        if(request('report')==null) { $book->report = 0; } else { $book->report = 1; }
        if(request('romance')==null) { $book->romance = 0; } else { $book->romance = 1; }
        if(request('thriller')==null) { $book->thriller = 0; } else { $book->thriller = 1; }
        if(request('youth')==null) { $book->youth = 0; } else { $book->youth = 1; }

       	$book->save();
        flash('Book added')->success();
      	return redirect('/books');
    }

    public function edit($id)
    {
        $author_id = Auth::user()->id;
        $book = Book::find($id);
        $main_title = 'Edit "'.$book->title . '"';
        if($author_id === $book->author_id)
        {
            return view('books.edit', compact('book', 'author_id', 'main_title'));
        } else
        {

        }
    }

    public function update($id)
    {

        $this->validate(request(), [
                'title'         => 'min:2|max:50|string|required',
                'description'   => 'min:50|max:1000|string|required'
            ]);

        $book = Book::findOrFail($id);
        if($book->title != request('title'))
        {
            if(Book::find(request('title')) === 0)
            {
                $book->title = request('title');
            } else {

            }
        }

        $book->title = request('title');
        $book->description = request('description');
        $book->author_id = request('author_id');

        if(request('comedy')==null) { $book->comedy = 0; } else { $book->comedy = 1; }
        if(request('fantasy')==null) { $book->fantasy = 0; } else { $book->fantasy = 1; }
        if(request('for_kids')==null) { $book->for_kids = 0; } else { $book->for_kids = 1; }
        if(request('history')==null) { $book->history = 0; } else { $book->history = 1; }
        if(request('moral')==null) { $book->moral = 0; } else { $book->moral = 1; }
        if(request('philosophy')==null) { $book->philosophy = 0; } else { $book->philosophy = 1; }
        if(request('religious')==null) { $book->religious = 0; } else { $book->religious = 1; }
        if(request('report')==null) { $book->report = 0; } else { $book->report = 1; }
        if(request('romance')==null) { $book->romance = 0; } else { $book->romance = 1; }
        if(request('thriller')==null) { $book->thriller = 0; } else { $book->thriller = 1; }
        if(request('youth')==null) { $book->youth = 0; } else { $book->youth = 1; }

        $book->save();

        return redirect('/books');

    }

    public function write($id, $chapter)
    {
        $author_id = Auth::user()->id;
        $book = Book::find($id);

        //$chapters = Book::chapters();

        $main_title = '"' . $book->title . '"';
        if($chapter === 'last')
        {
            $last_chapter = Chapter::LastChapter($book->id);

        } else {
            $last_chapter = Chapter::find($chapter);
        }

        if($last_chapter->exists())
        {

           return view('books.writebook', compact('book', 'author_id', 'last_chapter', 'main_title'));
        } else {
           return view('books.addchapter', compact('book','author_id', 'main_title'));

        }
    }
}