<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function condition(){
        return $this->belongsTo('App\Models\Condition');
    }
    public function type(){
        return $this->belongsTo('App\Models\Type');
    }
}
