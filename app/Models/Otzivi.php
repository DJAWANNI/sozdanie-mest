<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['otziv'])]
class Otzivi extends Model
{
  
            public function Zayavk(){
        return $this->belongsTo(Zayavk::class, 'n_id');
    }
}
