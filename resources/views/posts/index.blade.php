@extends('layouts.app')
@section('content')
<div class="container">
    @foreach ($posts as $post)
    	@include('posts.post')
	@endforeach
</div>
@endsection