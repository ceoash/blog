@extends('layouts/backend')

@section('title', 'New Video')
@section('stylesheets')
{!!Html::style ('css/select2.min.css') !!}

@stop
@section('mainContent')
	<div class="row">
		<div class="col-md-8" 
						
							{!! Form::open(array('route' => 'videos.store')) !!}

								{{ Form::label('video', 'Video URL:') }}
								{{ Form::text('video', null, array('class' => 'form-control')) }}
								{{ Form::label('title', 'Title') }}
								{{ Form::text('title', null, array('class' => 'form-control')) }}
								{{ Form::label('description', 'Description:') }}
								{{ Form::textarea('description', null, array('class' => 'form-control')) }}
								{{ Form::label('tags', 'Tags:', ["class" => 'form-spacing']) }}

								<select class="form-control select2-multi" name="tags[]" multiple="multiple"> 
								@foreach($tags as $tag)
								<option value="{{ $tag->id }}">{{ $tag->name }}</option>
								@endforeach
								</select>
								</div>

							<div class="col-md-4">
						<div class="card card-default">
                           <div class="card-body">
                           	{{ Form::label('image', 'Featured Image') }}
							{!! Form::file('image', array('class' => 'image')) !!}	
                           </div>
                        </div>
                        
                        	
						

								{!! Form::submit('Save Changes', array('class' => 'btn btn-success  btn-block')) !!}
								
							
{!! Form::close() !!}
</div> <!-- end of .row (form) -->
	

@stop
@section('scripts')
{!!Html::script ('js/select2.min.js') !!}
<script type="text/javascript">$( '.select2-multi').select2(); </script>
@stop