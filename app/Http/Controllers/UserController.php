<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //     public function registerForm()
    // {
    //     return view('registerPage');
    // }
    // Переходы по страницам
    public function index()
    {
        return view('index');
    }
      public function register(UserRegisterRequest $request)
    {
        $user = User::create($request->all());
        Auth::login($user);
        return redirect()->route('index');
        // return response()->json(['token'=>$user->createToken('api')->plainTextToken])->redirect()->route('index');
    }
     public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function auth(UserAuthRequest $request)
    {
        $user = User::where('login', $request->login)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('index');
            }
        }
        return back()->withErrors([
            'username' => 'Пользователь не найден'
        ]);
    }
}
