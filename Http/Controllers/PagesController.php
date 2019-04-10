<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use App\View;
use Illuminate\Support\Facades\DB;
use Mail;
use Session;


class PagesController extends Controller {

	public function getAbout() {

		return view('pages.frontend.about');
	}

	

	public function getIndex() {

		$trendings = Post::select(DB::raw('posts.*, count(*) as `aggregate`'))
    ->join('views', 'posts.id', '=', 'views.post_id')
    ->groupBy('post_id')
    ->orderBy('aggregate', 'desc')
    ->limit(4)
    ->get();

    $postCategories = PostCategory::with('posts')
						->orderBy('name', 'asc')
						->get();


		$posts = Post::orderBy('id', 'desc')->paginate(10);
		$sixmedias = Post::where('post_category_id', '3')->orderBy('created_at', 'desc')->limit(5)->get();
		$medias = Post::where('post_category_id', '1')->orderBy('created_at', 'desc')->limit(5)->get();
		
		return view('pages.frontend.home')->withSixmedias($sixmedias)->withMedias($medias)->withPosts($posts)->withTrendings($trendings);
		
	}

	public function getServices() {

		return view('pages.frontend.services'); 
		
	}

	public function getAdvertise() {

		return view('pages.frontend.advertise'); 
		
	}

	public function getFaq() {

		return view('pages.frontend.support.faq'); 
		
	}

		public function getContact() {

		return view('pages.frontend.support.contact'); 
		
	}

	public function postContact(Request $request) {

		$this -> validate($request, array(
					'enquiry'  =>  'required',
					'name'     =>  'required|min:2',
		            'email'    =>  'required|email',
		            'subject'  =>  'required|min:3|max:50',
		            'message'  =>  'required|min:3|max:600'
        ));

        $data = array(
        			'enquiry' => $request->enquiry,
        			'name'	  => $request->name,
        			'email'   => $request->email,
        			'subject' => $request->subject,
        			'bodyMessage' => $request->message
    	);

		Mail::send('emails.contact', $data, function($message) use ($data){

			$message->from($data['email']);
			$message->to('contact@sixmedia.co.uk' );
			$message->subject($data['subject'] );
		});
		 	Session::flash ('Thank you', 'Your message was sent successfully');

		 return redirect()->route('post.contact'); 
		
	}

		public function getTerms() {

		return view('pages.frontend.terms'); 
		
	}

		public function getPrivacy() {

		return view('pages.frontend.privacy'); 
		
	}

	public function getNews() {

		return view('pages.news'); 
		
	}


	public function getEvents() {

		return view('pages.events');
		
	}

	public function getCareers() {

		return view('pages.frontend.careers');
		
	}

}