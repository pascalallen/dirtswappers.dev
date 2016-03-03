@extends('layouts.master')

@section('top-script')

@stop

@section('content')

	<div class="content">
		<table>
			<tbody>
				@foreach ($posts as $post)
					<tr>
						<td><img class="post" src="{{{ $post->user->image }}}"></td>	
						<td><a href="{{{ action('PostsController@show', $post->id) }}}">{{{ $post->title }}}</a></td>
						<td>{{{ $post->created_at->diffForHumans() }}}</td>
						<td><a href="{{{ action('UsersController@show', $post->user->id)}}}">{{{ $post->user->username}}}</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $posts->links() }}
	</div>

@stop

@section('bottom-script')

@stop