<div class="row col-8">
	<form method="POST" action="/comments/create">
        @method('PUT')
		@csrf
		<input type="hidden" name="post_id" value="{{ $post->id }}">
		<div class="row">
		<div class="form-group col-sm">
			<input type="text" class="form-control" name="name" placeholder="Name">
		</div>
		<div class="form-group col-sm">
			<input type="email" class="form-control" name="email" placeholder="your@email.com (Optional)">
		</div>
		<div class="form-group col-sm">
			<input type="text" class="form-control" name="url" placeholder="your.website.com (Optional)">
		</div>
	</div>
		<div class="form-group">
			<textarea class="form-control" name="text" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Post</button>
	</form>
</div>