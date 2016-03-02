@extends('layouts.master')

@section('top-script')

@stop


@section('content')
	@if(Auth::user() != $user)
		{{{ $user->username }}}
		<img src="{{{ $user->image }}}">
	@else
		{{{ $user->username }}}
		<img src="{{{ $user->image }}}">
		<a href="{{ action('UsersController@edit', $user->id) }}"></a>
	@endif
	<br>
	{{{$user->username}}}'s Content</h1>

		<table>
			@foreach($user->posts()->get() as $post)
				<tr>
					<td><a href="{{{ action('PostsController@show', $post->id) }}}">{{{$post->title}}}</a></td>

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


	

@stop

@section('bottom-script')

@stop

