<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    public function action(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(auth()->attempt($request->only('email','password'))){
            $currentUser = auth()->user();

            return (new UserResource($currentUser))->additional([
             'meta' => [
                    'token' => $currentUser->api_token
                ],
            ]);
        }

        return response()->json([
            'error' => 'Your Credential does not match',            
        ],401);
    }

    public function logout(Request $request) 
    {
        $token = $request->user()->token();
        $token->revoke();
    
        $response = [
            'message' => 'You have been succesfully logged out!'
        ];
        
        return response($response, 200);
    }
}
