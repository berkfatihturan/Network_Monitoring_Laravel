<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;

    public function servers(){
        return $this->belongsToMany(Servers::class,'rooms');
    }

    public function mailSettings(){
        return $this->hasOne(DeviceMailSettings::class);
    }
}
