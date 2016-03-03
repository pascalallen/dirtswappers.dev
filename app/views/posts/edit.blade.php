@extends('layouts.master')

@section('top-script')

@stop

@section('content')

	{{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT', 'files' => true)) }}

		<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
			{{ $errors->first('title', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'value' => '{{{ $post->title }}}']) }}
			{{-- <input type="text" class="form-control" id="title" name="title" value="{{{ $post->title }}}"> --}}
		</div>

		<div class="form-group {{ ($errors->has('body')) ? 'has-error' : '' }}">
			{{ $errors->first('body', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('body', 'Body') }}
	        {{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Body', 'value' => '{{{ $post->body }}}']) }}
		</div>

		<div class="form-group {{ ($errors->has('image')) ? 'has-error' : '' }}">
			{{ $errors->first('image', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('image', 'Image') }}
			<p>Current Image:</p>
			{{{ $post->image }}}
			{{ Form::file('image') }}
		</div>

		<div class="{{ ($errors->has('location')) ? 'has-error' : '' }} form-group">
			{{ $errors->first('location', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('location', 'Location') }}
			{{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location', 'value' => '{{{ $post->location }}}']) }}
		</div>

		<button type="submit" class="btn btn-default">Submit</button>
		
	{{ Form::close() }}

	</div>
		
@stop

@section('bottom-script')

@stop