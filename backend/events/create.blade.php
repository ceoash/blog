@extends('layouts/backend')

@section('title' , 'New Event')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link type="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" href="/dash/css/jquery.timepicker.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

@stop

@section('mainContent')
						
						<div class="row">
							<div class="col-md-8">

							{!! Form::open(array('route' => 'events.store', 'files' => true)) !!}


								{{ Form::label('title', 'Title') }}
								{{ Form::text('title', null, array('class' => 'form-control')) }}
								{{ Form::label('subtitle', 'Subtitle') }}
								{{ Form::text('subtitle', null, array('class' => 'form-control')) }}
								{{ Form::label('description', 'Event  Description') }}
								{{ Form::textarea('description', null, array('class' => 'form-control')) }}
								{{ Form::label('details', 'Event Details') }}
								{{ Form::textarea('details', null, array('class' => 'form-control')) }}
								<hr>
								{{ Form::label('venue', 'Venue Name') }}
								{{ Form::text('venue', null, array('class' => 'form-control')) }}
								{{ Form::label('address', 'Address') }}
								{{ Form::text('address', null, array('class' => 'form-control')) }}
								{{ Form::label('address2', 'Address2') }}
								{{ Form::text('address2', null, array('class' => 'form-control'))
								 }}
								<div class="row">
								<div class="col-sm-9 no-mp">
									{{ Form::label('location_id', 'Location:') }}
								<select class="form-control" name="location_id"> 
								@foreach($locations as $location)
								<option value="{{ $location->id }}">{{ $location->county }}</option>
								@endforeach
								</select>
								</div>
								<div class="col-sm-3 no-mp"> 
								{{ Form::label('postcode', 'Postcode') }}
								{{ Form::text('postcode', null, array('class' => 'form-control')) }}

								</div>
							</div>
						</div>
						 

						<div class="col-md-4">	
							<div class="card card-default">												
								<div class="card-body">

								{{ Form::label('image', 'Upload Image') }}
							    {!! Form::file('image', array('class' => 'form-control')) !!}
							    
								   </div>
								</div>	

								<div class="card card-default">
								    <div class="card-body">	
								    		<div class="widget-title">Event Date & Time</div>
								    	
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
<div class="row">								
	<div class="col-md-6 no-mp" >   	
							   			 	{{ Form::label('date', 'End Date') }}</span>
							   			 	 {{Form::text('end_date', Carbon\Carbon::parse('now')->format('d/m/Y'), array('class' => 'form-control', 'class' => 'datepicker')) }}
							   			 	</div>

							   			 <div class="col-md-6 no-mp">
							   			 	{{ Form::label('end_time', 'End Time') }}
								    		{{Form::text('end_time', null, array('class' => 'form-control', 'class' => 'timepicker')) }}
							   			</div>
							   		</div>

							   											    
								    

								    
								     </div>
								 </div>
								 <div class="card card-default">
								 <div class="card-body"> 
								       {{ Form::label('ticketlink', 'Ticket Link') }}
										{{ Form::text('ticketlink', null, array('class' => 'form-control')) }}
										{{ Form::label('organiser', 'Organiser/Promoter') }}
										{{ Form::text('organiser', null, array('class' => 'form-control')) }}
										{{ Form::label('weblink', 'Website') }}
										{{ Form::text('weblink', null, array('class' => 'form-control')) }}
										
										
							    	</div>
								</div></div>

										{{ Form::submit('Post event', array('class' => 'widget-btn btn btn-success btn-lg btn-block btn-block')) }}
									{!! Form::close() !!}	

							
						</div>
											
@stop
@section('scripts')
<script type="text/javascript">
	$(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");
						var $uploadCrop,
						tempFilename,
						rawImg,
						imageId;
						function readFile(input) {
				 			if (input.files && input.files[0]) {
				              var reader = new FileReader();
					            reader.onload = function (e) {
									$('.upload-demo').addClass('ready');
									$('#cropImagePop').modal('show');
						            rawImg = e.target.result;
					            }
					            reader.readAsDataURL(input.files[0]);
					        }
					        else {
						        swal("Sorry - you're browser doesn't support the FileReader API");
						    }
						}

						$uploadCrop = $('#upload-demo').croppie({
							viewport: {
								width: 150,
								height: 200,
							},
							enforceBoundary: false,
							enableExif: true
						});
						$('#cropImagePop').on('shown.bs.modal', function(){
							// alert('Shown pop');
							$uploadCrop.croppie('bind', {
				        		url: rawImg
				        	}).then(function(){
				        		console.log('jQuery bind complete');
				        	});
						});

						$('.item-img').on('change', function () { imageId = $(this).data('id'); tempFilename = $(this).val();
																										 $('#cancelCropBtn').data('id', imageId); readFile(this); });
						$('#cropImageBtn').on('click', function (ev) {
							$uploadCrop.croppie('result', {
								type: 'base64',
								format: 'jpeg',
								size: {width: 150, height: 200}
							}).then(function (resp) {
								$('#item-img-output').attr('src', resp);
								$('#cropImagePop').modal('hide');
							});
						});
				// End upload preview image
</script>
<script type="text/javascript" src="/dash/js/jquery.timepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>

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
			

			