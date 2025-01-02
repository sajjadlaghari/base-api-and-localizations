<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocalization extends Model
{
    use HasFactory;

    protected $table ="users_localizations";

    protected $fillable = [
        'first_name',
        'last_name',
        'lang_key',
        'user_id',
    ];
}
