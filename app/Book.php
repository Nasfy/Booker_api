<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'pages', 'annotation', 'cover', 'author'
    ];

    protected $visible = [
        'user', 'title', 'pages', 'annotation', 'cover', 'author'
    ];
}
