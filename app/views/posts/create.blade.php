@extends('layouts.master')

@section('top-script')

@stop

@section('content')
	
		
	<p class="logo">post a tutorial</p>

		<div class = 'content form-div'>
		{{ Form::open(array('method' => 'post', 'action' => 'TutorialsController@store', 'files' => true)) }}

		<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
			{{ $errors->first('title', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter your title']) }}
		</div>

		<div class="form-group {{ ($errors->has('content')) ? 'has-error' : '' }}">
			{{ $errors->first('content', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('content', 'Content') }}
			{{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Enter your content', 'data-provide'=>'markdown', 'data-iconlibrary'=>'fa']) }}
		</div>

		<div class="form-group {{ ($errors->has('image')) ? 'has-error' : '' }}">
			{{ $errors->first('image', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('image', 'Image') }}
			{{ Form::file('image') }}
		</div>

		<div class="form-group {{ ($errors->has('video')) ? 'has-error' : '' }}">
			{{ $errors->first('video', '<div class="alert alert-danger">:message</div>') }}
			{{ Form::label('video', 'Video') }}
			{{ Form::file('video', null) }}
		</div>

		<div>
				@foreach($tags as $tag)
					{{ Form::label('tuttags[]', $tag->name)}}
					{{ Form::checkbox('tuttags[]', $tag->id)}}
					<span class="tags-pad"></span>
				@endforeach
			<br>
			{{ Form::label('addtag', "Don't see a tag? Add it here!")}}
			{{ Form::text('addtag', null,array('id' => 'addtag', 'placeholder'=>'Add a Tag!'))}}
		</div>

	{{ Form::submit('submit', ['class'=>'gm-button']) }}
	{{ Form::close() }}
	</div>

@stop

@section('bottom-script')

@stop