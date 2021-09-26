<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['name','user_id','created_at','updated_at'];

    public function news(){
      return  $this->hasMany(News::class);
    }
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}

