<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use App\Tag;


use Session;

class TagController extends Controller
{

    public function getTag($tag) {

        $tag = Tag::with('posts')       
                     ->where('name', '=', $tag)
                     ->first();

  
     $categories = PostCategory::all();

     
       
        // return view
        return view ('categories.categoriesposts')->with('tagslug', $tagslug)->with('categories', $categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->with('tags', $tags);
    
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, array('name' => 'required|max:255'));
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'The tag was saved successfully!');

         return redirect()->route('tags.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tag)
    {
       
        $tag = Tag::where('name', '=', $tag)->first();
        return view('tags.show')->with('tag', $tag);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        if ($request->input('name') == $tag->name) {
        return view('tags.edit')->with('tag', $tag);    }    
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
        $tag = Tag::find($id);
        $this->validate($request, ['name' => 'required|max:255']);
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'Updated Tag successfully');



        return redirect()->route('tags.show', $tag->id);   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $tag = Tag::find($id);
    $tag->post()->detach();

    $tag->delete();

    Session::flash('success', 'The Tag was deleted successfully!');

        return redirect()->route('tags.index');    
    }

     
       
        
}
