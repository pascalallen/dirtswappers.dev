@extends('layouts.master')

@section('top-script')

@stop

@section('content')

	{{ Form::open(array('action' => 'HomeController@postLogin')) }}
		<div class="{{ ($errors->has('email')) ? 'has-error' : '' }} form-group">
			{{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder'=>'Email']) }}
		</div>
		<div class="{{ ($errors->has('password')) ? 'has-error' : '' }} form-group">
			{{ $errors->first('password', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', ['class' => 'form-control', 'placeholder'=>'Password']) }}
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	{{ Form::close() }}

@stop

@section('bottom-script')

@stop