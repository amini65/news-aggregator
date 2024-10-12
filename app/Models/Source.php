<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'access_key',
        'secret_key',
        'url'
    ];
    public function articles()
    {
        return $this->belongsToMany(Article::class,'source_article','source_id','article_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'source_category','source_id','category_id');
    }
}
