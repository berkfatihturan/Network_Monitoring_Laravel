<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_login_permission extends Model
{
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class);
    }
}
