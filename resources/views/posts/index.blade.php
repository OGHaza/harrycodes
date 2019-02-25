@extends('layouts.app')
@section('content')
<div class="container">
    @foreach ($posts as $post)
    	<div class="post">
    		<a href="posts/{{ $post->id }}">
	    		<div class="post-header">
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
	    		</div>
	    	</a>
    		<div class="post-content">@markdown( $post->content )</div>
    	</div>
	@endforeach
</div>
@endsection