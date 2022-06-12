<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

//    relationship between user and post
    public function user(){
        # code
        return $this->belongsTo('App\Models\User');
    }

////    relation between category and post
//    public function category(){
//        # code
//        return 'Category Name';
//    }

//    relation  between photo an post
    public function photo(){
        # code
        return $this->belongsTo('App\Models\Photo');
    }
}
