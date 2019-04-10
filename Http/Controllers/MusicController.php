<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Music;
use App\Genre;
use Session;

class MusicController extends Controller

{

    public function __construct() 

        {

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

            $musics = Music::orderBy('id', 'desc')->paginate(10);

            return view('pages.backend.music.index')->withMusics($musics);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()

        {
        	$genres = Genre::all();

            return view ('pages.backend.music.create')->with('genres', $genres);
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

            'title'  => 'required',
            'subtitle' => 'max:50',
            'release_date'  => 'required',
            'artist' => 'required',
            'description'  => 'required',
            'genre_id' => 'required|integer',
            'producer' => 'max:20',
            'link' => 'required'

        ));

        // save post in db

        $music = new Music;

        $music->image = $request->image;
        $music->thumb = $request->thumb;
        $music->title = $request->title;
        $music->subtitle = $request->subtitle;
        $music->release_date = $request->release_date;
        $music->genre_id = $request->genre_id;
        $music->producer = $request->producer;
        $music->description = $request->description;
        $music->link = $request->link;

        $music->user_id = auth()->id();

        $music->save();


        Session::flash('success', 'The music post was saved successfully!');

        return redirect()->route('music.show', $music->id);

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)

        {
        
        $musics = Music::find($id);

        $genres = Genre::with('music')
                            ->orderBy('name', 'asc')
                            ->first();
        
        return view('pages.backend.music.show')->with('musics', $musics)->with('genres', $genres);

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

            $music   = Music::find($id);

            $genres  = Genre::all();

            $gen = array();
            foreach ($genres as $genre){ $gen[$genre->id] = $genre->name; }


        // return a view and pass in var we created 

        return view('pages.backend.music.edit')->with('music', $music)->with('genres', $gen);

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
        
            $music = Music::find($id);

            $this -> validate($request, array(

                'title'  => 'required',
                'subtitle' => 'max:50',
                'release_date'  => 'required',
                'artist' => 'required',
                'description'  => 'required',
                'genre_id' => 'required|integer',
                'producer' => 'max:20',
                'link' => 'required'

            ));
            
            // save data to db

            $music = Music::find($id);

            $music->image = $request->input('image');
            $music->thumb = $request->input('thumb');
            $music->title = $request->input('title');
            $music->subtitle = $request->input('subtitle');
            $music->release_date = $request->input('release_date');
            $music->genre_id = $request->input('genre_id');
            $music->producer = $request->input('producer');
            $music->description = $request->input('description');
            $music->link = $request->input('link');

            $music->save();

            // set flash data with success message
            Session::flash ('success', 'This project was updated successfully');

            // redirect the flash data to video.show
            return redirect()->route('music.show', $music->id );
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)

        {
            $music = Music::find($id);

            $music->delete();

            Session::flash('success', 'The video was deleted successfully!');

            return redirect()->route('music.index');
        }
}
