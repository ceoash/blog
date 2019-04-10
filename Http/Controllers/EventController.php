<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Session;
use App\Tag;
use App\Location;
use Carbon\Carbon;

class EventController extends Controller
{

    public function __construct() {
            $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all video from it in database
        $events = Event::orderBy('id', 'desc')->paginate(10);
        return view('pages.backend.events.index')->withevents($events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       
        $tags = Tag::all();
        $locations = Location::all();

        return view ('pages.backend.events.create')->with('tags', $tags)->with('locations', $locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate data 
        $this -> validate($request, array(
             'title' => 'required|max:255',
             'subtitle' => 'required|max:255',
             'description'  => 'required',
             'details'  => 'required',
             'location_id'  => 'required|integer',
             'venue'  => 'required',
             'address'  => 'required',
             'postcode'  => 'required|min:5|max:7',
             'weblink'  => 'max:50',
             'ticketlink'  => 'required',
             
             'strt_time'  => 'required',
             'end_time'  => 'required'




        ));

        // save post in db
        $event = new Event;

        $event->title = $request->title;
        $event->subtitle = $request->subtitle;
        $event->description = $request->description;
        $event->details = $request->details;
        $event->location_id = $request->location_id;
        $event->venue = $request->venue;
        $event->address = $request->address;
        $event->address2 = $request->address2;
        $event->ticketlink = $request->ticketlink;
        $event->weblink = $request->weblink;
        $event->image = $request->image;
        $event->thumb = $request->thumb;

        $event->strt_date = $request->strt_date;
        $event->end_date = $request->end_date;

        $event->strt_time = $request->strt_time;
        $event->end_time = $request->end_time;

       
    





        $event->save();

        Session::flash('success', 'The event was saved successfully!');

        return redirect()->route('events.show', $event->id);

                    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    $events = Event::find($id);
    return view('pages.backend.events.show')->with('events', $events);

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find post in db and save as a var
        $events = Event::find($id);
        // return a view and pass in var we created 
        $tags = Tag::all();
        
    return view('pages.backend.events.edit')->with('events', $events)->with('tags', $tags);

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate the data
            $video = Event::find($id);
            if ($request->input('slug') == $video->slug) {

         $this -> validate($request, array(

           'title' => 'required|max:255',
             'description'  => 'required',
             'location'  => 'required',
             'address'  => 'required',
             'link'  => 'required'



        ));

    } else {

       $this -> validate($request, array(
            'video'  => 'required',
           'title' => 'required|max:255',
             'description'  => 'required',
             'location'  => 'required',
             'address'  => 'required',
             'link'  => 'required',



             'slug' => 'required|alpha_dash|min:5|max:255'
        ));
        }

        // save data to db
         $event = new Event;

        $event->title = $request->title;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->address = $request->address;
        $event->image = $request->image;
        $event->thumb = $request->thumb;
        $event->link = $request->link;

        $event->slug = $request->slug;

        $event->save();

        // set flash data with success message
        Session::flash ('success', 'This event was saved successfully');

        // redirect the flash data to video.show
        return redirect()->route('events.show', $event->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::find($id);

        $event->delete();

        Session::flash('success', 'The event was deleted successfully!');
        return redirect()->route('events.index');
    }
}
