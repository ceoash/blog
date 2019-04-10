<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use App\View;
use App\Tag;
use Illuminate\Support\Facades\DB;
use App\Classes\Slim;
use Image;

use Session;

class PostController extends Controller
{

    public function __construct() {
            $this->middleware('auth');

    }

     public function getPostCategory($catslug) {

    $postCategories = PostCategory::with('posts')       
                     ->where('catslug', '=', $catslug)
                     ->first();

  
     $categories = PostCategory::all();

     
       
        // return view
        return view ('categories.categoriesposts')->with('postCategories', $postCategories)->with('categories', $categories);
    }

   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // create a variable and store all posts from it in database
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('pages.backend.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $postCategories = PostCategory::all();
        $tags = Tag::all();
        return view ('pages.backend.posts.create')->with('postCategories', $postCategories)->with('tags', $tags);
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

            'post_category_id'   =>  'required|integer',
            'title'              =>  'required|max:255',
            'body'               =>  'required',
            'slug'               =>  'required|alpha_dash|min:5|max:255'


        ));

        // save post in db

        $post = new Post;

        $post->post_category_id = $request->post_category_id;
        $post->title = $request->title;
        $post->meta_description = $request->meta_description;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->user_id = auth()->id();


        
        if ($request->hasFile('featimage')) {

            $image = $request->file('featimage');
            $filename = time() . '.' . $image->getCLientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $post->image = $filename;
            
        }

        $post->save();

        $post->tags()->sync($request->tags, false);


        Session::flash('success', 'The blog post was saved successfully!');

        return redirect()->route('posts.show', $post->id);

                    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id) {
    
        $categories = PostCategory::with('posts')->orderBy('name', 'asc')->get();
    

        $postCategories = PostCategory::with('posts')
                        ->orderBy('name', 'asc')
                        ->first();

    //fetch from db based on slug

        $post = Post::find($id);
        
    return view('pages.backend.posts.show')->with('post', $post)->with('categories', $categories);

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

        $post = Post::find($id);
        $postCategories = PostCategory::all();

        $cats = array();
        foreach ($postCategories as $postCategory) {
            $cats[$postCategory->id] = $postCategory->name;
    }
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {$tags2[$tag->id] = $tag->name;}
        
        // return a view and pass in var we created 

        return view ('pages.backend.posts.edit')->with('post', $post)->with('postCategories', $cats)->withTags($tags2);
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
            $post = Post::find($id);
            if ($request->input('slug') == $post->slug) {

        $this -> validate($request, array(

            'title' => 'required|max:255',
            'body'  => 'required'
        ));

        } else {

        $this -> validate($request, array(
            'title' => 'required|max:255',
            'body'  => 'required',
            'slug'  => 'required|alpha_dash|min:5|max:255'
        ));
        }

        // save data to db
         $post = Post::find($id);

         $post->post_category_id = $request->input('post_category_id');
         $post->title = $request->input('title');
         $post->body =  $request->input('body');
         $post->slug =  $request->input('slug');
         $post->tags()->sync($request->tags);

         $post->save();

        // set flash data with success message
        Session::flash ('success', 'This post was saved successfully');

        // redirect the flash data to posts.show
        return redirect()->route('posts.show', $post->slug );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'The post was deleted successfully!');

        return redirect()->route('posts.index');
    }
}
