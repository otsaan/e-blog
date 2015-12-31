<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
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
        return $this->hasOne('App\Category');
    }

}
