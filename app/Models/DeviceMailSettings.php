<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceMailSettings extends Model
{
    use HasFactory;
    public $timestamps =false;

    public function device(){
        return $this->belongsTo(Devices::class);
    }
}
