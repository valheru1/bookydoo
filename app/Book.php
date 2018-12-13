<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //

    public function chapter()
    {
    	return $this->hasMany(Chapter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeUserBooks($query, $id)
    {
    	return $query->where('author_id', $id);
    }

    protected $guarded = ['title', 'description'];
}
