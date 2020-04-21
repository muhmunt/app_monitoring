<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth; 
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request){
        // $error = 0;
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user();
            $message = 'Login successful';
            $error = false;
            // $success['token'] =  $user->createToken('MyApp')->accessToken; 
            return response()->json(['user' => $user,'error' => $error,'message' => $message], $this->successStatus); 
        } 
        else{
            return response()->json(['error'=> 'Unauthorization'], 401); 
        } 
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
            if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 401);            
            }

        $input = $request->all(); 
                $input['password'] = bcrypt($input['password']); 
                $user = User::create($input); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus); 
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
