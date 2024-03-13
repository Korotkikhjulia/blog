<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    // use HasFactory;
    use Sluggable;
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function sluggable():array
    {
        return [
            'slug'=>[
                'source'=>'title'
            ]
            ];
    }
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'category_id',
        'views',
        'thumbnail',
    ];
}
