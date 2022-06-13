<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;
    protected $guarded = [];

//    relation between replies and comment replies belongs to comment
    public function comment(){
        # code
        return $this->belongsTo('App\Models\Comment');
    }

//    find user of the reply
    public function user(){
        # code
        return $this->belongsTo('App\Models\User');
    }
}
