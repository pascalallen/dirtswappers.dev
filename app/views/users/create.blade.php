@extends('layouts.master')

@section('top-script')

@stop

@section('content')

	{{ Form::open(array('action' => 'UsersController@store', 'method' => 'post', 'files' => true)) }}
	
		<div class="{{ ($errors->has('username')) ? 'has-error' : '' }} form-group">
			{{ $errors->first('username', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
		</div>

		<div class="{{ ($errors->has('password')) ? 'has-error' : '' }} form-group">
			{{ $errors->first('password', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
		</div>

		<div class="{{ ($errors->has('email')) ? 'has-error' : '' }} form-group">
			{{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
		</div>

		<div class="{{ ($errors->has('image')) ? 'has-error' : '' }} form-group">
			{{ $errors->first('image', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('image', 'Image') }}
			{{ Form::file('image') }}
		</div>

		<div class="{{ ($errors->has('location')) ? 'has-error' : '' }} form-group">
			{{ $errors->first('location', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('location', 'Location') }}
			{{ Form::text('location', null, ['class' => 'form-control', 'placeholder' => 'Location']) }}
		</div>

		{{ Form::submit('submit') }}

	{{ Form::close() }}

@stop

@section('bottom-script')

@stop