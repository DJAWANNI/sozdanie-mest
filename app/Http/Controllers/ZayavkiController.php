<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZayavkRequest;
use App\Models\Zayavk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZayavkiController extends Controller
{
     public function orderCreate(ZayavkRequest $request)
    {
        $zayavka = new Zayavk();
        $zayavka->user_id = Auth::user()->id;
        $zayavka->place_id = $request->place;
        $zayavka->data = $request->data;
        $zayavka->pay = $request->pay;
        $zayavka->save();
        $zayavki = Zayavk::all();
        return view('index', compact('zayavki'));
    }
}
