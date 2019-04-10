<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\View;
use App\Post;
use App\PostCategory;
use Illuminate\Support\Facades\DB;

use Session;

class ArticlesController extends Controller

{ 

	public function getSingle($slug) {

		$categories = PostCategory::with('posts')->orderBy('name', 'asc')->get();

		$postCategories = PostCategory::with('posts')
						->orderBy('name', 'asc')
						->first();

		//fetch from db based on slug
		$post = Post::where('slug', '=', $slug)->first();
		View::createViewLog($post);

		// return view
		return view ('pages.frontend.articles.single')->withPost($post)->with('categories', $categories);
	}


	public function getIndex() {

		$categories = PostCategory::with('posts')->orderBy('name', 'asc')->get();
					
		//fetch from db based on slug
		$posts = Post::orderBy('id', 'desc')->paginate(5);

		// return view
		return view ('pages.frontend.articles.index')->withPosts($posts)->with('categories', $categories);

	}

    // $postCategories->posts - already is a collection of your posts related only to the category you're looking for


    public function getPostCategory($catslug) {

    $postCategories = PostCategory::with('posts')       
    				 ->where('catslug', '=', $catslug)
                     ->first();

  
     $categories = PostCategory::all();

     $trendings = Post::select(DB::raw('posts.*, count(*) as `aggregate`'))
    ->join('views', 'posts.id', '=', 'views.post_id')
    ->groupBy('post_id')
    ->orderBy('aggregate', 'desc')
    ->limit(4)
    ->get();
       
        // return view
        return view ('pages.frontend.articles.category.categoriesposts')->with('postCategories', $postCategories)->with('categories', $categories)->with('trendings', $trendings);

	}

}
