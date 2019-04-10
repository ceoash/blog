<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;
use App\View;


class VideoViewController extends Controller
{
 public function getVideo($slug)
    {
        //fetch from db based on slug
		$video = Video::where('slug', '=', $slug)->first();

		View::createViewLog($video);
		// return view
		return view ('pages.media.videos.single')->withVideo($video);


    }


    public function getIndex()
    {
        //fetch from db based on slug
		$videos = Video::orderBy('id', 'desc')->paginate(10);



		// return view
		return view ('pages.media.videos.index')->withVideos($videos);


    }
}