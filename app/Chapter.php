<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

    public function scopeLastChapter($query, $book_id)
    {
    	return $query->where('book_id', $book_id)->orderBy('updated_at', 'desc')->first();
    }

    protected $guarded = ['title'];
}
