@extends('layouts.app')
@section('content')
<div class="container">
	<form method="POST" action="/posts/create">
        @method('PUT')
		@csrf
		<div class="form-group">
			<input type="text" class="form-control" name="title" placeholder="Title">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="subtitle" placeholder="Subtitle">
		</div>
		<div class="form-group">
			<textarea class="form-control" name="content" rows="12"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Create</button>
	</form>
</div>
@endsection