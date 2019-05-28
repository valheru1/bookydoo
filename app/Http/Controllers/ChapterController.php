<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Chapter;
use App\Book;

class ChapterController extends Controller
{


    public function addchapter($id)
    {
    	$author_id = Auth::user()->id;
    	$book = Book::find($id);
        $main_title = 'Add new chapter to "' . $book->title . '"';
    	return view('books.addchapter', compact('author_id', 'book', 'main_title'));

    }

    public function store()
    {
    	$this->validate(request(), [
       			'chapter_title' 		=> 'required|min:1|max:50|string',
       		]);

    	$chapter = new Chapter();

    	$chapter->book_id = request('book_id');
    	$chapter->author_id = request('author_id');
    	$chapter->chapter_title = request('chapter_title');
    	$chapter->content = request('content');
    	if(request('published')==null) { $chapter->published = 0; } else { $chapter->published = 1; }

    	$chapter->save();

    	return redirect('/books/'.$chapter->book_id.'/write/last');

    }

    public function writestore($id)
    {
    	$chapter = Chapter::findOrFail($id);
        $chapter->content = request('book_chapter');

    	$chapter->save();

    	return redirect('/books/'.$chapter->book_id.'/write/'.$chapter->id);
    }
}
