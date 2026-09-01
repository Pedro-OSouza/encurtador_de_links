<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    protected $fillable = ['original_url', 'code', 'clicks'];

    public static function generateUniqueCode(): string {
        do {
            $code = Str::random(6);
        } while (self::where('code', $code)->exists());

        return $code;
    }
}
