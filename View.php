<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model


{
	  protected $table = 'views';


      public static function createViewLog($post) {

        $views = new View();
        $views->post_id = $post->id;
        $views->url = \Request::url();
        $views->session_id = \Request::getSession()->getId();
        $views->user_id = (\Auth::check())?\Auth::id():null; //this check will either put the user id or null, no need to use \Auth()->user()->id as we have an inbuild function to get auth id
        $views->ip = \Request::getClientIp();
        $views->agent = \Request::header('User-Agent');
        $views->save();//please note to save it at lease, very important
    }

    public function posts()

    // Catagory belongs to more than 1 post
    
    {

        return $this->hasMany('App\Post', 'post_category_id');
    }


}
