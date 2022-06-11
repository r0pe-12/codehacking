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


    public function user(){
        # code
        return $this->hasOne('App\Models\User');
    }
}
