<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use Session;
use App\Tag;
use Auth;

class VideoController extends Controller
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
        $video = Video::orderBy('id', 'desc')->paginate(10);
        return view('pages.backend.videos.index')->withvideos($video);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::all();
        // find post in db and save as a var

        $video = Video::all();
        // return a view and pass in var we created 

    return view('pages.backend.videos.create')->with('video', $video)->with('tags', $tags);
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
            'video'  => 'required',
            'title' => 'required|max:255',
            'description'  => 'required',
            'slug' => 'required|alpha_dash|min:5|max:255'

        ));

        // save post in db
        $video = new Video;

        $video->video = $request->video;
        $video->title = $request->title;
        $video->description = $request->description;
        $video->slug = $request->slug;
        $video->user_id = auth()->id();

        $video->save();

        $video->tags()->sync($request->tags, false);

        Session::flash('success', 'The video was saved successfully!');

        return redirect()->route('videos.show', $video->id);

                    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    $videos = Video::find($id);

    return view('pages.backend.videos.show')->with('videos', $videos);

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {   
        $tags = Tag::all();

        // find post in db and save as a var

        $video = Video::find($id);

        // return a view and pass in var we created 

    return view('pages.backend.videos.edit')->with('video', $video)->with('tags', $tags);

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
            $video = Video::find($id);

            if ($request->input('slug') == $video->slug) {

         $this -> validate($request, array(

            'video'  => 'required',
            'title' => 'required|max:255',
            'description'  => 'required',
        ));

    } else {

       $this -> validate($request, array(
            'video'  => 'required',
            'title' => 'required|max:255',
            'description'  => 'required',
            'slug'  => 'required|alpha_dash|min:5|max:255'
        ));

        }

        // save data to db
         $video = Video::find($id);

         $video->video = $request->input('video');
         $video->title = $request->input('title');
         $video->description =  $request->input('description');
         $video->slug =  $request->input('slug');

         $video->save();

        // set flash data with success message
        Session::flash ('success', 'This video was updated successfully');

        // redirect the flash data to video.show
        return redirect()->route('videos.show', $video->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);

        $video->delete();

        Session::flash('success', 'The video was deleted successfully!');

        return redirect()->route('videos.index');
    }
}
