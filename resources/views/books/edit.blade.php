@extends('layouts.app')
@section('content')
    <editbook
    author="{{ Auth::user()->id }}"
    book_id="{{ $book->id }}"
    book_title="{{ $book->title }}"
    book_description="{{ $book->description}}"
    book_comedy="{{ $book->comedy }}"
    book_for_kids="{{ $book->for_kids }}"
    book_fantasy="{{ $book->fantasy }}"
    book_history="{{ $book->history }}"
    book_moral="{{ $book->moral }}"
    book_philosophy="{{ $book->philosophy }}"
    book_religious="{{ $book->religious }}"
    book_report="{{ $book->report }}"
    book_romance="{{ $book->romance }}"
    book_thriller="{{ $book->thriller }}"
    book_youth="{{ $book->youth }}"
    >
    </editbook>
@endsection
