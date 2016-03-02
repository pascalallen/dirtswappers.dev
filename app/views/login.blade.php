@extends('layouts.master')

@section('top-script')

@stop

@section('content')

	<div class="form-main">
			<div class ="form-div">
				{{ Form::open(array('action' => 'HomeController@postLogin'), ['class'=>'form', 'id'=>'form1']) }}

					<div class="{{ ($errors->has('email')) ? 'has-error' : '' }}">
						{{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
						{{-- {{ Form::label('email', 'Email') }} --}}
						{{ Form::text('email', Input::old('email'), ['class' => 'form-control form-input email', 'placeholder'=>'Enter your email']) }}
					</div>

					<div class="{{ ($errors->has('password')) ? 'has-error' : '' }}">
						{{ $errors->first('password', '<div class="alert alert-danger">:message</div>') }}
						{{-- {{ Form::label('password', 'Password') }} --}}
						{{ Form::password('password', ['class' => 'password form-control form-input', 'placeholder'=>'Enter your password']) }}
						{{ Form::submit('submit', ['class'=>'button-blue']) }}
					</div>
				{{ Form::close() }}
			</div>
	</div>

@stop

@section('bottom-script')

@stop