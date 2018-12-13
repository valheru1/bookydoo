@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" action="/books/{{ $book->id }}/addchapter">
    {{ csrf_field() }}

         	<div class="text-center">
                <div class="form-group">
                    <label for="chapter_title">Title</label>
                    <input type="text" id="chapter_title" name="chapter_title" class="chapter_title"></br>

                    <span id="helpblock" class="glyphicon" aria-hidden="true" font-size="12"></span>

                </div>
                <div class="form-group">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="author_id" value="{{ $author_id}}">
                    <input type="hidden" name="content" value="Add the content of your book">
                    <input type="hidden" name="published" value="0">
                	
                </div>
                
            </div>
            <div class="text-center">
                
                <button type="submit" class="btn btn-primary">Add chapter</button>
            </div>
</form>
</div>
@endsection