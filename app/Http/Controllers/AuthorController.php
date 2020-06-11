<?php

namespace App\Http\Controllers;

use App\Author;

class AuthorController extends ApiControllers
 {
     public function __construct(Author $model) {
         $this->model = $model;
     }
 }
