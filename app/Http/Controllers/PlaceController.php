<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function placeCreate(PlaceRequest $request)
    {
        // $place = Place::create($request->all());
        $place = new Place();
        $place->name = $request->name;
        $place->opisanie = $request->opisanie;
        $place->image = 'storage/images/' . Storage::disk('images')->put('/', $request->file('image'));
        $place->save();
        return redirect()->back();
    }
    public function destroy(Place $place)
    {
        $place->delete();
        return redirect()->back();
    }
}
