@extends('layouts.app')

@section('content')
	<div class="container">
			@if($author_id == $book->author_id)
			    <div class="row">
			    	
			    	<div class="col-md-2">
				    	
				    	<ul>
					    	@foreach($book->chapter as $chapter)
					    		<li><a href="/books/{{ $book->id }}/write/{{ $chapter->id }}">{{ $chapter->chapter_title }}</a></li>
					    	@endforeach
				    	</ul>
				    	<div class="center"><a href="/books/{{ $book->id }}/addchapter"><button class="btn btn-primary" type="submit">Add next chapter</button></a></div>

			    	</div>
		            <div class="col-md-6 col-md-offset-0">

		                <div class="panel panel-default">
		                    
			                <form method="POST" action="/books/{{ $last_chapter->id }}/writestore">
			                {{ csrf_field() }}
			                {{ method_field('PATCH')}}
				                <div class="panel-body">
				                    	<textarea id="book_chapter" name="book_chapter">
				                    	{{ $last_chapter->content }}
				                    	</textarea>
				                </div>
				               	
				            	<div class="panel-footer">				     
				            	 	<button type="submit" class="btn btn-primary">
	                    				<b>Save</b>
	                				</button>
				            	</div>
			            	</form> 
			            </div>
			        </div>
			    </div>
		    @else
		    	THIS IS NOT YOUR BOOK!
		    @endif
	</div>
	
@endsection