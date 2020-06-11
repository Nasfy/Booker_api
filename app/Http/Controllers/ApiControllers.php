<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class ApiControllers extends Controller
{
    protected $request;
    protected $model;

    public function get(Request $request) {
        $result = $this->model->get();
        return $this->sendResponse($result, 'OK', 200);
    }
}
