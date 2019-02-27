<div class="post">
	<div class="post-header">
		<a href="/posts/{{ $post->id }}">
			<div class="post-title">{{ $post->title }}</div>
			@if (!empty($post->subtitle))
			<div class="post-subtitle">{{ $post->subtitle }}</div>
			@endif 
		</a>
		<row><div class="post-author">
			by {{ $post->user->name }}, {{ $post->created_at->diffForHumans() }}
			@if ($post->updated_at != $post->created_at)
			(updated {{ $post->updated_at->diffForHumans() }})
			@endif
			@if ($post->user->id == \Auth::id())
			| <a href="/posts/{{ $post->id }}/edit">Edit</a>
			@endif
		</div>
	</row>
		<div class="post-tag-row">
			@foreach ($post->tags as $tag)
			<div class="post-tag float-left">
				{{ $tag->tag }}
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="post-content">
		@markdown( $post->content )
	</div>
</div>