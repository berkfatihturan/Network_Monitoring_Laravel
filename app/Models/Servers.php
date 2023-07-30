<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    use HasFactory;

    public function port(){
        return $this->hasMany(Ports::class);
    }

    public function devices()
    {
        return $this->belongsToMany(Devices::class,'rooms');
    }
}
