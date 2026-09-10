<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['data','status','pay'])]
class Zayavk extends Model
{
   public function Zayavk(){
        return $this->hasMany(Zayavk::class);
    }
}
