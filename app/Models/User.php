<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'photo_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    relation between roles and user
    public function role(){
        # code
        return $this->belongsTo('App\Models\Role');
    }

//    relation between photos and user
    public function photo(){
        # code
        return $this->belongsTo('App\Models\Photo');
    }

//    relation between users and posts
    public function posts(){
        # code
        return $this->hasMany('App\Models\Post');
    }

//    user has many comments
    public function comments(){
        # code
        return $this->hasMany('App\Models\Comment');
    }

//    user has many replies
    public function replies(){
        # code
        return $this->hasMany('App\Models\CommentReply');
    }

//    check if user has role_name role
    public function hasRole($role_name){
        # code
        if ($this->is_active){
            return strtolower($this->role->name) === strtolower($role_name);
        }
    }
}
