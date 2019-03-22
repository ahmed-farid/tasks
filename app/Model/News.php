<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news'; 
    protected $fillable = ['name', 'image', 'description', 'cat_id'];


    public function category()
    {
    	return $this->belongsTo('App\Model\Category', 'cat_id');
    }
}
