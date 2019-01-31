<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
  
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
  
        $user = new User([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
        if($user->save()) {
            $user->signin = [
                'href' => 'api/user/signin',
                'method' => 'POST',
                'params' => 'email,password'
            ];
            $response = [
                'msg' => "User created success",
                'user' => $user
            ];
            return response()->json($response,200);
        }
        $response = [
            'msg' => 'An error occurred'
        ];
  
        return response()->json($response, 404);
    }
    public function signin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        if ($user = User::where('email', $email)->first()){
            $credentials = [
              'email' => $email,
              'password' => $password
            ];
            $response = [
                'msg' => 'User signin',
                'user' => $user
            ];
            return response()->json($response, 200);
        }
        $response = [
            'msg' => 'An error occurred'
        ];
  
        return response()->json($response, 404);
    }
}
