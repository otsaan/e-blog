<?php

namespace App;

use Conner\Likeable\LikeableTrait;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use LikeableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'views', 'description',
        'user_id', 'blog_id', 'category_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
