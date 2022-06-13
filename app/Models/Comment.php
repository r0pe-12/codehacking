<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

//    relation between comments and replies Comment has many replies
    public function replies(){
        # code
        return $this->hasMany('App\Models\CommentReply');
    }

//    relation between comments and posts comments belongs to post
    public function post(){
        # code
        return $this->belongsTo('App\Models\Post');
    }

//    find user who uploaded comment
    public function user(){
        # code
        return $this->belongsTo('App\Models\User');
    }
}
