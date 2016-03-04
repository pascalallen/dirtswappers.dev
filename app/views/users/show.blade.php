@extends('layouts.master')

@section('top-script')

@stop

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(Auth::user() != $user)
				{{{ $user->username }}}
				<img src="{{{ $user->image }}}">
			@else
				<h1>Let's Do This, {{{ $user->username }}}!</h1>
				<img src="{{{ $user->image }}}">
			@endif
			<br>
			{{{ $user->username }}}'s Content</h1>

				<table>
					@foreach($user->posts()->get() as $post)
						<tr>
							<td><a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a></td>

							@if(Auth::id()== $user->id)
							<td><a href="{{{ action('PostsController@edit', $post->id) }}}"><button class = "gm-button">Edit</button></a></td>

							{{ Form::open(array('action' => array('PostsController@destroy', $post->id, 'files' => true), 'method' => 'DELETE')) }}
							<td><button class = "gm-button">Delete</button></td>
							{{Form::close()}}
							@endif
						</tr>
					@endforeach
				</table>
		</div>
	</div>

@stop

@section('bottom-script')

@stop

