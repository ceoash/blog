<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Location;
use App\Tag;
use Session;




class EventViewController extends Controller
{
 public function getSingle($id)
    {
        //fetch from db based on slug
	$events = Event::find($id)->first();

		// return view
		return view ('pages.frontend.events.single')->withEvents($events);


    }

    public function getIndex()
    {
        //fetch from db based on slug
	$events = Event::all();
	$locations = Location::all();

		// return view
		return view ('pages.frontend.events.index')->withEvents($events);


    }
}
