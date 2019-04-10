@extends('layouts/backend')

@section('title' , 'New Music')
@section('styles')
<link rel='stylesheet' href='https://foliotek.github.io/Croppie/croppie.css'>
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 



    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet">      

@stop

@section('mainContent')
<div class="row">

<div class="col-md-8">
		
							
								{!! Form::model($music, ['route' => ['music.update', $music->id], 'method' => 'PUT']) !!}

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

								
							    
								<div class="widget-title">Release Date</div>
								    	
										<div class="row">
								    	<div class="col-md-6 no-mp" >
								    	{{ Form::label('date', 'Start Date') }}
								    	 {{Form::text('strt_date', Carbon\Carbon::parse('now')->format('d/m/Y'), array('class' => 'form-control', 'class' => 'datepicker')) }}
										</div>

								<div class="col-md-6 no-mp">
								{{ Form::label('strt_time', 'Start Time ') }}
								{{Form::text('strt_time', null, array('class' => 'form-control', 'class' => 'timepicker')) }}
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


			
<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <h4 class="modal-title" id="myModalLabel">
							  	Edit</h4>
							</div>
							<div class="modal-body">
				            <div id="upload-demo" class="center-block"></div>
				      </div>
							 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
      </div>
@stop
@section('scripts')





 


<script type="text/javascript" src="/dash/js/jquery.timepicker.min.js"></script>

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