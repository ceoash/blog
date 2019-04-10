@extends('layouts/backend')

@section('title' , 'Event Post')
@section('scripts')
<link rel="stylesheet" href="/css/main.css">

@stop

@section('mainContent')
<div class="row">
               <!-- Blog Content-->
               <div class="col-xl-9">
                  <div class="card card-default">
                     
                     <div class="card-body text-md">
                        <div class="row">
                        	<div class="event-image no-mp col-md-8">
								<img src="/images/event.jpg">
							</div>
							<div class="col-md-4 no-mp event-summary">
								<div class="event-date">{{ $events->evemt_date }}</div>
								<div class="event-location">{{ $events->location }}</div>
							<div><h3 class="event-title">{{ $events->title }}</h3></div>
							<div class="event-tagline"><wm>{{ $events->subtitle }}</wm></div>
							<p>Prices from <b><italic> £10.00</italic></b></p>
							<button class="btn btn-primary btn-block" name="ticket-link">Get tickets</button>
						</div>
					</div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header"><em class="fas fa-pencil-alt mr-2"></em>Description</div>
                     <div class="card-body">
                        {{ $events->description }}
                     </div>
                  </div>
                   <div class="card">
                     <div class="card-header"><em class="fas fa-pencil-alt mr-2"></em>Additional info</div>
                     <div class="card-body">
                        {{ $events->description }}
                     </div>
                  </div>
               </div><!-- Blog Sidebar-->
               <div class="col-xl-3">
                  <div class="row">
                     
                     
                     <div class="col-4 col-xl-12">
                     	<div class="btn btn-block btn-primary">Edit Event</div>
                     	<div class="btn btn-block btn-danger">Delete Event</div>
                        <!-- Tag Cloud-->
                        <div class="card card-default">
                           <div class="card-header">Tags</div>
                           <div class="card-body">
                              
                           </div>
                        </div>
                     </div>
                     <div class="col-4 col-xl-12">
                        <!-- Ads-->
                        <div class="card card-default">
                           <div class="card-header">Important information</div>
                           <div class="card-body">
                           	<p>Venue address<br>
                            {{ $events->address }},
                            {{ $events->location }},
                            {{ $events->postcode }}
                        </p>
							<p>Organiser<br>
						    	{{ $events->organiser }}</p>
						    <p>Website<br>
						    	{{ $events->weblink }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
   

@stop
			