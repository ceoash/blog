@extends('layouts/backend')

@section('title', 'Edit Video')
@section('stylesheets')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@stop
@section('mainContent')

		<div class="row">
				<div class="col-md-8">
								{!! Form::model($video, ['route' => ['videos.update', $video->id], 'method' => 'PUT']) !!}

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
							{{ Form::file('image', array('class' => 'image')) }}	
                        </div>
                    </div>
                        
                    <div class="card card-default">
                        <div class="card-body">
							{{ Form::submit('Save Changes', array('class' => 'btn btn-success btn-block')) }}
								<a href="{{URL::previous()}}"><button class="btn btn-danger btn-block">Cancel</button></a>
						</div>
					</div>
				</div> 
{!! Form::close() !!}
</div> 
	

@stop
@section('scripts')
<script type="text/javascript">
$( '.select2-multi').select2(); </script>
@stop