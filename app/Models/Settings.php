<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    public static function getEmail():mixed{
        $email = Settings::first()->from_email_address;
        echo ($email);
    }
}
