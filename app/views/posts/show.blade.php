@extends('layouts.master')

@section('top-script')

@stop

@section('content')

	<div class="content">
		@if(Auth::user() == $post->user)
			<button type="submit" class="btn btn-default" id="edit">Edit Post</button>
			{{ Form::open(array('action' => array('PostsController@destroy', $post->id, 'files' => true), 'method' => 'DELETE')) }}
				<button type="submit" class="btn btn-default">Delete</button>
			{{ Form::close() }}
		@endif

		<h3 class="title">{{{ ($post->title) }}}</h3>
		<h5 class="location">{{{ ($post->location) }}}</h3>
		<p class="body">{{{ ($post->body) }}}</p>

		<div class="row">
			@if (isset($post->image))
				<img src="{{{ $post->image }}}" class="col-xs-8 post-image">
			@endif
		</div>

	</div>

	<blockquote>
		<footer>Created by {{{ $post->user->username }}}, {{{$post->created_at->diffForHumans() }}}</footer>
	</blockquote>

@stop

@section('bottom-script')

	<script type="text/javascript">
		$('#edit').click(function() {
			window.location="{{{ action('PostsController@edit', $post->id) }}}";
		});
	</script>

@stop