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

//    accessor for pulling out user profile photo
    public function getFileAttribute($file){
        # code
        return $this->files . $file;
    }
}
