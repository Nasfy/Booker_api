<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;

class UserController extends ApiControllers
 {

     public function register(UserRequest $request) {
         $user = new User;
         $user->name = $request->input("name");
         $user->email = $request->input("email");
         $user->password = bcrypt($request->input("password"));
         $user->save();
         return $this->sendResponse(NULL, 'OK', 201);
        // return $this->sendResponse(null, 'User registered', 201);
    }

 }
