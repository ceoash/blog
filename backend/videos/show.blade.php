@extends('layouts/backend')

@section('title', 'Video Preview')
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
                           <h3 class="text-lg mt-3">{{ $videos->title }}</h3>
                           <p class="d-flex"><span><small class="mr-1">By<a class="ml-1" href="#">{{$videos->user->name}}</a></small><small class="mr-1">May 03, 2015</small></span><span class="ml-auto"><small><strong>56</strong><span>Comments</span></small></span></p>
                        </div>
                     </div>
<iframe class="video-con" width="100%" height="420px"
src="{{ $videos->video }}">
</iframe>
                      <div class="btn-group" role="group" aria-label="..."><button class="btn btn-secondary" type="button"><em class="fab fa-facebook-f text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fab fa-twitter text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fab fa-google-plus-g text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fa fa-tumblr text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fa fa-pinterest text-muted"></em></button><button class="btn btn-secondary" type="button"><em class="fa fa-share-alt text-muted"></em></button></div>
                 
                     <div class="card-body text-md">
                        {{ $videos->description }}
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
		{!! Html::linkRoute('videos.edit', 'Edit', array($videos->id), array('class' => 'btn btn-square btn-primary btn-block')) !!}
			{!! Form::open(['route' => ['videos.destroy', $videos->id], 'method' => 'DELETE']) !!}
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
					<p> <a href="{{ route('articles.single', $videos->slug) }}">{{ route('articles.single', $videos->slug) }}</a>
					</p>
					</p>
				</dl>
				<dl class="dl-horizontal">
					<label><strong>Category:</strong></label>
					<p></p>
				</dl>
				<dl class="dl-horizontal">
					<p><strong>Created At:</strong> {{ date('d M, Y G:i', strtotime($videos->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
				
					<p><strong>Last Updated:</strong> {{ date('d M, Y G:i', strtotime($videos->updated_at)) }}</p>
				</dl>
						
				{!! Form::close() !!}
				<hr>

				{!! Html::linkRoute('videos.index', 'Back to videos', array($videos->id), array('class' => 'btn btn-square btn-primary')) !!}
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-4 col-xl-12">
                        <!-- Ads-->
                        <div class="card card-default">
                           <div class="card-header">Tags</div>
                           <div class="card-body">
							@foreach($videos->tags as $tag)
											
							<button class="mb-1 btn-xs btn btn-outline-primary" type="button">{{$tag->name}}</button>
							@endforeach	
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @stop