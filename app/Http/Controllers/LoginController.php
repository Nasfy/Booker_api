<?php

namespace App\Http\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\Http\Requests\LoginRequest;


class LoginController extends ApiControllers
 {

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                //return response()->json(['error' => 'invalid_credentials'], 401);
                return $this->sendError('invalid_credentials', 401);

            }
        } catch (JWTException $e) {
        //    return response()->json(['error' => 'could_not_create_token'], 500);
            return $this->sendError('could_not_create_token', 500);
        }
        //return response()->json(compact('token'));
        return $this->sendResponse(compact('token'), 'OK',200);

   }
 }
