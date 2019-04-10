@extends('layouts/backend')

@section('title', 'Post Preview')
@section('stylesheets')
{!!Html::style ('css/select2.min.css') !!}

@stop
@section('mainContent')

<div class="row">
               <!-- Blog Content-->
               <div class="col-xl-9">
                  <div class="card card-default">
                     <div class="card-header">
                        <div class="bb">
                           <h3 class="text-lg mt-3">{{ $post->title }}</h3>
                           <p class="d-flex"><span><small class="mr-1">By<a class="ml-1" href="#">{{$post->user->name}}</a></small><small class="mr-1">May 03, 2015</small></span><span class="ml-auto"><small><strong>56</strong><span>Comments</span></small></span></p>
                        </div>
                     </div>
                     									<img src="/images/no-image.jpg">

                      <div class="btn-group" role="group" aria-label="..."><button class="btn btn-secondary" type="button"><em class="fab fa-facebook-f text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fab fa-twitter text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fab fa-google-plus-g text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fa fa-tumblr text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fa fa-pinterest text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fa fa-share-alt text-muted"></em></button></div>
                 
                     <div class="card-body text-md">
                        {{ $post->body }}
                        <hr class="my-4">
                       
                 
              </div>
          </div>
               </div><!-- Blog Sidebar-->
               <div class="col-xl-3">
                  <div class="row">
                    
                     <div class="col-4 col-xl-12">
                        <!-- Tag Cloud-->
                        <div class="card card-default">
                           <div class="card-header">Settings</div>
                           <div class="card-body">
		{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-square btn-primary btn-block')) !!}
			{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) !!}
	
                           </div>
                        </div>
                     </div>
                     <div class="col-4 col-xl-12">
                        <!-- Categories-->
                        <div class="card card-default">
                           <div class="card-header">Summary</div>
                           <div class="card-body">
                              <dl class="dl-horizontal">
					<label><strong>URL:</strong></label>
					<p> <a href="{{ route('articles.single', $post->slug) }}">{{ route('articles.single', $post->slug) }}</a>
					</p>
					</p>
				</dl>
				<dl class="dl-horizontal">
					<label><strong>Category:</strong></label>
					<p><a href="">{{$post->postCategory->name}}</a> </a>
				</dl>
				<dl class="dl-horizontal">
					<p><strong>Created At:</strong> {{ date('d M, Y G:i', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
				
					<p><strong>Last Updated:</strong> {{ date('d M, Y G:i', strtotime($post->updated_at)) }}</p>
				</dl>
						
				{!! Form::close() !!}
				<hr>

				{!! Html::linkRoute('posts.index', 'Back to Posts', array($post->id), array('class' => 'btn btn-square btn-primary')) !!}
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-4 col-xl-12">
                        <!-- Ads-->
                        <div class="card card-default">
                           <div class="card-header">Tags</div>
                           <div class="card-body">
							@foreach($post->tags as $tag)
							<button class="mb-1 btn-xs btn btn-outline-primary" type="button">{{$tag->name}}</button>
							@endforeach	
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

											
										

	

@stop
			