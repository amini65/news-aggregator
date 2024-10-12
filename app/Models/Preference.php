<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sources()
    {
        return $this->belongsToMany(Source::class,'preference_source','preference_id','source_id');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class,'preference_category','preference_id','category_id');
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class,'preference_article','preference_id','article_id');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class,'preference_author','preference_id','author_id');
    }
}
