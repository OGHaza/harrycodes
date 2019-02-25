@extends('layouts.app')
@section('content')
<div class="container">
	<form method="POST" action="/posts/{{ $post->id }}/update">
        @method('PUT')
		@csrf
		<div class="form-group">
			<input type="text" class="form-control" name="title" placeholder="Title" value="{{ $post->title }}">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="subtitle" placeholder="Subtitle" value="{{ $post->subtitle }}">
		</div>
		<div class="form-group">
			<textarea class="form-control" name="content" rows="12">{{ $post->content }}</textarea>
		</div>
		<button type="submit" class="btn btn-primary">Update</button>
	</form>
</div>
@endsection