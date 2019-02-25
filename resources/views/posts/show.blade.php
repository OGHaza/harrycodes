@extends('layouts.app')
@section('content')
<div class="container">
	<div class="post">
		<div class="post-header row">
			<div class="col">
				<div class="post-title">{{ $post->title }}</div>
				@if (!empty($post->subtitle))
					<div class="post-subtitle">{{ $post->subtitle }}</div>
				@endif 
				<div class="post-author">
	    			by {{ $post->user->name }}, {{ $post->created_at->diffForHumans() }}
					@if ($post->updated_at != $post->created_at)
					    (updated {{ $post->updated_at->diffForHumans() }})
					@endif
				</div>
				<div class="post-actions">	
					@if ($post->user->id == \Auth::id())
					<a href="/posts/{{ $post->id }}/edit">Edit</a>
					@endif
				</div>
			</div>
		</div>
		<div class="post-content">@markdown( $post->content )</div>
	</div>
</div>
@endsection