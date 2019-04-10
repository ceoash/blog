@extends('layouts/backend')

@section('title' , 'Events')

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
				@foreach ($events as $event)

				<tr>
					<th>{{ $event->id }}</th>
					<td>{{ $event->title }}</td>
					<td>{{ substr($event->description, 0, 50) }} {{ strlen($event->description) > 50 ? "..." : "" }}</td>
					<td></td>
					<td>{{ date('d m, y', strtotime ($event->created_at)) }}</td>
					
					<td><a href="{{ route('events.show', $event->id) }}" class="btn btn-default"> View</a>
						<a href="{{ route('events.edit', $event->id) }}" class="btn btn-default"> Edit</a>
					</td>


				</tr>

				@endforeach

			</tbody>
		</table>
		<div class="text-center">
		{!! $events->links() !!}	
		</div>
	</div>
</div>

@stop