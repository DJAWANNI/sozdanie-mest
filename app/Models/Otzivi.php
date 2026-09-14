<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['otziv', 'user_id','zayavk_id'])]
class Otzivi extends Model
{
  
     public function zayavk(){
        return $this->belongsToMany(Zayavk::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
