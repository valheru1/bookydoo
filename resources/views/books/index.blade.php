@extends('layouts.app')

@section('content')
	<div class="container">
		
		@foreach($books as $book)
		    <div class="row">
	            <div class="col-md-5 col-md-offset-1">
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                    	{{ $book->title }}
	                    </div>
		                <div class="panel-body">
		                    {{ $book->description }}
		                </div>
		                @if($id==$book->author_id)
		            	    <div class="panel-footer"><a href="/books/{{$book->id}}/write/last">Write this book</a><a href="/books/{{$book->id}}/edit">Edit</a></div>
		                @endif
		            </div>
		        </div>
		    </div>
	    @endforeach
	</div>
@endsection