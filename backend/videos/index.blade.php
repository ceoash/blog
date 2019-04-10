@extends('layouts/backend')

@section('title' , 'Videos')

@section('mainContent')
	

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thread>
				<th>#</th>
				<th>Title</th>
				<th>Description</th>
				<th>Views</th>
				<th>Created At</th>
				<th></th>
			</thread>

			<tbody>
				@foreach ($videos as $video)

				<tr>
					<th>{{ $video->id }}</th>
					<td>{{ $video->title }}</td>
					<td>{{ substr($video->description, 0, 50) }} {{ strlen($video->description) > 50 ? "..." : "" }}</td>
					<td></td>
					<td>{{ date('d m, y', strtotime ($video->created_at)) }}</td>
					
					<td><a href="{{ route('videos.show', $video->id) }}" class="btn btn-default"> View</a>
						<a href="{{ route('videos.edit', $video->id) }}" class="btn btn-default"> Edit</a>
					</td>


				</tr>

				@endforeach

			</tbody>
		</table>
		<div class="text-center">
		{!! $videos->links() !!}	
		</div>
	</div>
</div>

@stop