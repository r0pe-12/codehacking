<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

//    mutator for storing name
    public function setNameAttribute($name){
        # code
        $this->attributes['name'] = ucfirst($name);
    }
}
