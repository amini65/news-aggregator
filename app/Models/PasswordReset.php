<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    protected $guarded=[];

    //since we don't have update_at column we can override update_at column field
    const UPDATED_AT = null;
}
