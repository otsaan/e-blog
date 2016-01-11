<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'views',
        'user_id', 'blog_id', 'category_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function attachments()
    {
        return $this->hasMany('App\Attachment');
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
