<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

//    relationship between user and post
    public function user(){
        # code
        return $this->belongsTo('App\Models\User');
    }

//    relation between category and post
    public function category(){
        # code
        return $this->belongsTo(Category::class);
    }

//    relation  between photo an post
    public function photo(){
        # code
        return $this->belongsTo('App\Models\Photo');
    }

//    relation between posts and comments Post has many comments
    public function comments(){
        # code
        return $this->hasMany('App\Models\Comment');
    }


//    custom method for gething the post photo out
    public function getPhoto(){
        # code
        if ($this->photo){
            return $this->photo->file;
        }
        return 'https://via.placeholder.com/900x900.png/280137?text=NO%20PHOTO';
    }
}
