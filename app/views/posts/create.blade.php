@extends('layouts.master')

@section('top-script')

@stop

@section('content')

	{{ Form::open(array('method' => 'post', 'action' => 'PostsController@store', 'files' => true)) }}

		<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
			{{ $errors->first('title', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter your title']) }}
		</div>

		<div class="form-group {{ ($errors->has('body')) ? 'has-error' : '' }}">
			{{ $errors->first('body', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('body', 'Body') }}
			{{ Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Body']) }}
		</div>

		<div class="form-group {{ ($errors->has('image')) ? 'has-error' : '' }}">
			{{ $errors->first('image', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('image', 'Image') }}
			{{ Form::file('image') }}
		</div>

		<div class="form-group {{ ($errors->has('location')) ? 'has-error' : '' }}">
			{{ $errors->first('location', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('location', 'Location') }}
			{{ Form::file('location', null) }}
		</div>

		{{ Form::submit('submit') }}
	{{ Form::close() }}
	</div>

@stop

@section('bottom-script')

@stop