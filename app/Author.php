<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $fillable = [
        'name', 'surname'
    ];

    protected $visible = [
        'name', 'surname'
    ];
}
