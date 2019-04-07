<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'author',
        'number_of_copies',
        'price',
        'lend_cost',
    ];

    public function lendBooks()
    {
        return $this->hasMany(Lend::class, 'book_id');
    }

    public function isLend()
    {
        return auth()->check() && $this->lendBooks()->whereUserId(auth()->id())->whereStatus(1)->count();
    }
}
