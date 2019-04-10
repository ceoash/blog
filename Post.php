<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model 
{
    //


    	
    public function user()

    	{	

    	return $this->belongsTo('App\User');
    	
    	}

     public function postCategory()
    	{	

    	return $this->belongsTo('App\PostCategory');
    	
    	}
     public function tags()
        {   

        return $this->belongsToMany('App\Tag');
        
        }

     public function views()
        {   

        return $this->belongsTo('App\View');
        
        }
    }
