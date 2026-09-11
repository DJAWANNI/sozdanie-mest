<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserAuthRequest;
use App\Models\Place;
use App\Models\User;
use App\Models\Zayavk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function registerPage()
    {
        return view('registerPage');
    }

    public function authPage()
    {
        return view('authPage');
    }
    public function admin()
    {
        $places = Place::all();
        return view('admin', compact('places'));
    }
  
 public function zayavka()
    {
        $places = Place::all();
        $zayavki = Zayavk::all();
        return view('zayavka', compact('places', 'zayavki'));
    }
    public function index()
    {
         $places = Place::all();
        $zayavki = Zayavk::all();
        return view('index', compact('places', 'zayavki'));
    }
    public function register(UserRegisterRequest $request)
    {
        $user = User::create($request->all());
        Auth::login($user);
        return redirect()->route('index');
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
