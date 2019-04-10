@extends('layouts/backend')

@section('title' , 'Edit Event')

@section('mainContent')
<div class="row">
	<div class="col-md-8">
							
							{!! Form::model($events, ['route' => ['events.update', $events->id], 'method' => 'PUT']) !!}								
		
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
			

