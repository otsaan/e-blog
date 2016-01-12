<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = ['content', 'read', 'to_user_id', 'from_user_id'];


    public function from()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function to()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
