<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Http\Requests\ZayavkRequest;
use App\Models\Place;
use App\Models\Zayavk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZayavkiController extends Controller
{
     public function zayavkCreate(ZayavkRequest $request)
    {
        $zayavka = new Zayavk();
        $zayavka->user_id = Auth::user()->id;
        $zayavka->place_id = $request->place;
        $zayavka->data = $request->data;
        $zayavka->pay = $request->pay;
        $zayavka->save();
        $zayavki = Zayavk::where('user_id', auth::user()->id)->get();
        $places = Place::all();
        return view('index', compact('zayavki','places'));
    }
    public function status(StatusRequest $request, Zayavk $zayavk) 
    {
        $zayavk -> status = $request -> status;
        $zayavk->save();
        return back();
        
    }
}
