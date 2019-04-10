@extends('layouts/backend')

@section('title' , 'New Music')
@section('styles')

  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://foliotek.github.io/Croppie/croppie.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
      <link rel="stylesheet" href="css/cropstyle.css">

 <link rel='stylesheet' href='https://foliotek.github.io/Croppie/croppie.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link type="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" href="/dash/css/jquery.timepicker.min.css">

<!-- jQuery library -->

@stop

@section('mainContent')
<div class="row">

<div class="col-md-8">
	<button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#cropImage"> Large modal</button>
		
							
							{!! Form::open(array('route' => 'music.store')) !!}
							{{ Form::label('genre_id', 'Genre') }}
								<select class="form-control" name="genre_id"> 
									
								@foreach($genres as $genre)
								<option value="{{ $genre->id }}">{{ $genre->name }}</option>
								@endforeach
								</select>
								
								{{ Form::label('title', 'Project Name') }}
								{{ Form::text('title', null, array('class' => 'form-control')) }}
								
								{{ Form::label('subtitle', 'Subtitle') }}
								{{ Form::text('subtitle', null, array('class' => 'form-control')) }}
								
								
		
								{{ Form::label('description', ' Description') }}
								{{ Form::textarea('description', null, array('class' => 'form-control')) }}								
</div>
<div class="col-md-4">	
	<input type="file" name="upload_image" id="upload_image" />
	<div id="uploaded_image"></div>

							  
							    
								<div class="widget-title">Release Date</div>
								    	
										<div class="row">
								    	<div class="col-md-6 no-mp" >
								    	{{ Form::label('date', 'Date') }}
								    	 {{Form::text('release_date', Carbon\Carbon::parse('now')->format('d/m/Y'), array('class' => 'form-control', 'class' => 'datepicker')) }}
										</div>

								<div class="col-md-6 no-mp">
								{{ Form::label('release_time', 'Time ') }}
								{{Form::text('release_time', null, array('class' => 'form-control', 'class' => 'timepicker')) }}
  								</div>
  							</div>

								{{ Form::label('Price', 'Price') }}
								{{ Form::text('price', null, array('class' => 'form-control')) }}
								

								{{ Form::label('artist', 'Artist') }}
								{{ Form::text('artist', null, array('class' => 'form-control')) }}
								{{ Form::label('producer', 'Producer') }}

								{{ Form::label('producer', 'Producer') }}
								{{ Form::text('producer', null, array('class' => 'form-control')) }}
								 	    

								{{ Form::label('link', 'Purchase Weblink') }}
								{{ Form::text('link', 'www.itunes.com/your-project', array('class' => 'form-control')) }}
								


							
								{{ Form::submit('Save', array('class' => 'btn btn-primary btn-lg btn-block')) }}
								{!! Form::close() !!}	


							
</div>

</div>			



						    </div>
						  </div>
						</div>
						<div class="modal fade" id="cropImage" tabindex="-1" role="dialog" aria-labelledby="cropImage" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="cropImage">Crop Image</h4><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            	<div class="row">
            	<div class="col-md-12 text-center">
            		<div id="image_preview" style="width: 350px;"></div>
            	</div>
            </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancek</button><button class="btn btn-success crop_image" type="button">Crop Image</button></div>
         </div>
      </div>
   </div>
  
@stop
@section('scripts')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>

<script src='https://foliotek.github.io/Croppie/croppie.js'></script>
<script type="text/javascript" src="/dash/js/jquery.timepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript">
	
	
</script>
<script type="text/javascript">

	$('.datepicker').datepicker({
    defaultDate: 'today'
});

</script>

<script type="text/javascript">
    $('.timepicker').timepicker({ 'scrollDefault': 'now', 
									'timeFormat': 'H:i'});
								</script>



 

@stop
			