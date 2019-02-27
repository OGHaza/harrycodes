@extends('layouts.app')
@section('content')
<div class="container">
	@include('posts.post')

	<div class="post-subtitle pb-4">Comments ({{ count($post->comments) }})</div>
	@forelse ($post->comments as $comment)
		@include('comments.show')
	@empty
		No comments yet
	@endforelse
	<div class="post-subtitle pb-4 pt-4">Reply</div>
	@include('comments.create')
</div>
@endsection