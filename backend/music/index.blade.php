@extends('layouts/backend')

@section('title' , 'Music')

@section('mainContent')
	

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thread>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created At</th>
				<th></th>
			</thread>

			<tbody>
				@foreach ($musics as $music)

				<tr>
					<th>{{ $music->id }}</th>
					<td>{{ $music->title }}</td>
					<td>{{ substr($music->body, 0, 50) }} {{ strlen($music->body) > 50 ? "..." : "" }}</td>
					<td>{{ date('d m, y', strtotime ($music->created_at)) }}</td>
					
					<td><a href="{{ route('music.show', $music->id) }}" class="btn btn-default"> View</a>
						<a href="{{ route('music.edit', $music->id) }}" class="btn btn-default"> Edit</a>
					</td>


				</tr>

				@endforeach

			</tbody>
		</table>
		<div class="text-center">
		{!! $musics->links() !!}	
		</div>
	</div>
</div>

@stop