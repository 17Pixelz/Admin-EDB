<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    private static $value = null;

    public static function setToken($token){
        Token::$value = $token;
    }

    public static function getToken(){
        return Token::$value;
    }
}
