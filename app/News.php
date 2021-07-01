<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [ 'user_id','category_id','title','description','pubDate','thumbnail_url','created_at','updated_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
