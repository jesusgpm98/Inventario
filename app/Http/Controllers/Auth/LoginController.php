<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{

  public function login(Request $request){

    $data = request()->validate([
      // 'email' => '|email|required|string',
      'username' => 'required|string',
      'password' => 'required|string'
    ]);

    if(Auth::attempt($data)){
      return redirect()->route('productos.index');
    }else{
      return back()
      ->withErrors(['$errors' => trans('auth.failed')])
      ->withInput(request(['email']));
    }
  }

  public function create(){
    return view('login.create');
  }

  public function store(Request $request){
    $data = request()->validate([
      'nombre' => 'required',
      'username' => 'required|unique:users,userName',
      'email' => 'required|unique:users,email|email',
      'password' => 'required|min:6|confirmed|required_with:password_confirmation|same:password_confirmation'
    ]);

    $user = User::create([
      'name' => $data['nombre'],
      'userName' => $data['username'],
      'email' => $data['email'],
      'password' => Hash::make($data['password'])
    ]);

    return redirect()->route('productos.index');
  }

  public function logout(){
    Auth::logout();

    return redirect('/');
  }
}
