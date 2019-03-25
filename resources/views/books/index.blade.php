@extends('layouts.app')

@section('content')
	<div class="container">
        {{-- <div class="card">
            <div class="card-body"> --}}
            <div class="row">

                @foreach($books as $book)
                    <div id="books">
                        <div class="card">
                                   <div class="card-header">
                                            {{ $book->title }}
                                        </div>
                                <div class="card-body">

                                <div class="card-text">
                                    {{ $book->description }}
                                </div>
                                @if($id==$book->author_id)
                                    <div class="panel-footer"><a href="/books/{{$book->id}}/write/last" class="card-link">Write this book</a><a href="/books/{{$book->id}}/edit" class="card-link" style="float: right;">Edit</a></div>
                                @endif
                            </div>
                            </div>
                    </div>
                @endforeach

            </div>
            {{-- </div>
        </div> --}}
	</div>
@endsection
