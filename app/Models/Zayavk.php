<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['data','place_id','pay'])]
class Zayavk extends Model
{
     public function place(){
      return $this->belongsTo(Place::class);
    }
    public function user(){
      return $this->belongsTo(User::class);
    }
}
