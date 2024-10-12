<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function preferences()
    {
        return $this->belongsToMany(Preference::class);
    }

    public function sources()
    {
        return $this->belongsToMany(Source::class,'source_category','category_id','source_id');
    }
}
