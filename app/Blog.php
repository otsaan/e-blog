<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
