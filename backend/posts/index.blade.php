@extends('layouts/backend')

@section('title' , 'Articles')

@section('stylesheets')

<link rel="styles" href="/dash/css/custom.css">

@stop

@section('mainContent')
	

<div class="row">
	<div class="col-md-12">
	 	<div class="card card-default">
			<div class="table-responsive">
            <table class="table table-bordered table-hover" id="table-ext-1">
			<thread>
				<th>ID</th>
				<th>Title</th>
				<th>Category</th>
				<th>Author</th>
				<th>Views</th>
				<th>Created</th>
				<th></th>
			</thread>

			<tbody>
				@foreach ($posts as $post)

				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>{{ $post->postCategory->name}}</td>
					<td>{{$post->user->name}} </td>
					<td>1 </td>
					<td>{{ date('d m, y', strtotime ($post->created_at)) }}</td>
					<td><a href="{{ route('posts.show', $post->slug) }}" class="btn btn-default"> View</a>
						<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default"> Edit</a>
					</td>


				</tr>

				@endforeach

			</tbody>
			</table>
		</div>
	</div>
		<div class="text-center">
		{!! $posts->links() !!}	
		</div>
	</div>
</div>

@stop