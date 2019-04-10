<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PostCategory extends Model
{
    // connect Categories to Pots tables

    protected $table = 'post_categories';
  

    public function posts()

    // Catagory belongs to more than 1 post
    
    {

    	return $this->hasMany('App\Post', 'post_category_id');
    }

  

}


