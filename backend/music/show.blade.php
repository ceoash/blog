@extends('layouts/backend')

@section('title' , 'Music Preview')
@section('scripts')
<link rel="stylesheet" href="/dash/css/custom.css">

@stop

@section('mainContent')
<div class="row">
               <!-- Blog Content-->
               <div class="col-xl-9">
                  <div class="card card-default">
                     
                     <div class="card-body text-md">
                        <div class="row">
                        	<div class="music-image no-mp col-md-6">
									<img src="images/al.jpg">
								</div>
							<div class="col-md-6 no-mp music-summary">
								<div class="music-date">GRIME</div>
								<div class="music-location">MIXTAPE</div>
								<div class="music-title">{{ $musics->title }}</div>
								<h3 class="music-artist">{{ $musics->artist }}</h3>
								<div class="music-tagline"><wm>{{ $musics->subtitle }}</wm></div>

								<div class="col-sm-12 no-mp music-main-details">

									<table class="music-info-table" style="width:60%">
								  <tr>
								    <th>Release Date</th>
								    <td>{{ $musics->realease_date }}</td>
								  </tr>
								  <tr>
								  	<th>Price</th>
								    <td>£{{ $musics->price }}</td>
								  </tr>
								  <tr>
								  	<th>Outlet</th>
								  	<td> <!-- Info button with label--></td>
								  </tr>
								</table>
								<button class="mb-1 btn btn-outline-purple btn-block">Listen Now</button>
						</div>
						</div>
					</div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header"><em class="fas fa-pencil-alt mr-2"></em>Description</div>
                     <div class="card-body">
                        {{ $musics->description }}
                     </div>
                  </div>
                
               </div><!-- Blog Sidebar-->
               <div class="col-xl-3">
                  <div class="row">
                     
                     
                     <div class="col-4 col-xl-12">
                     	{!! Html::linkRoute('music.edit', 'Edit', array($musics->id), array('class' => 'btn btn-square btn-primary btn-block')) !!}
			{!! Form::open(['route' => ['music.destroy', $musics->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block')) !!}
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
                           	<p>Artist<br>
                            
                        </p>
							<p>Organiser<br>
						    	</p>
						    <p>Website<br>
						    	{{ $musics->link }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
   

@stop
			