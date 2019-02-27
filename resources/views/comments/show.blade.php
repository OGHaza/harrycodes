<div class="comment">
	<div class="comment-header">
		{{ $comment->name }}, {{ $comment->created_at->diffForHumans() }}
	</div>
	<div class="comment-text">
		{{ $comment->text }}
	</div>
</div>