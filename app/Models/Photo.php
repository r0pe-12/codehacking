<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable =[
        'file',
    ];

    protected $files = '/storage/images/';


    public function user(){
        # code
        return $this->hasOne('App\Models\User');
    }

    public function post(){
        # code
        return $this->hasOne('App\Models\Post');
    }

//    accessor for pulling out user profile photo
    public function getFileAttribute($file){
        # code
        return $this->files . $file;
    }

//    returns owner of the picture user or post
    public function owner(){
        # code
        if ($user = $this->user){
            return '<a href="' . route('users.edit', $user) . '">User: ' . $user->name . '</a>';
        } elseif($post = $this->post){
            return '<a href="' . route('posts.edit', $post) . '">Post: ' . $post->title . '</a>';
        }
        return 'no owner';
    }
}
