<?php

namespace App\Http\Controllers;

use App\Http\Requests\OtziviRequest;
use App\Models\Otzivi;
use App\Models\Zayavk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtziviController extends Controller
{
      public function otzivCreate(OtziviRequest $request, Zayavk $zayavk)
    {
        $otziv = new Otzivi();
        $otziv->otziv = $request->otziv;
        $otziv->user_id = Auth::user()->id;
        $otziv->zayavk_id = $zayavk->id;
        $otziv->save();
        return back();  
    }
}
