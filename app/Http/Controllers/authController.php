<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
public function register(Request $request){
    $user= User::create([
        'name'=> $request->input('name'),
        'email'=> $request->input('email'),
        'password'=>Hash::make($request->input('password')) 
    ]);
    return  response([
        'message'=> 'row added sucessfully'
    ]);
}

    //authentification avec token
   public function login(Request $request){
if(!Auth::attempt($request->only('email','password'))){
    return response([
        'message'=> 'row added sucessfully'
    ]);
}
$user = Auth::user();

   }
}
