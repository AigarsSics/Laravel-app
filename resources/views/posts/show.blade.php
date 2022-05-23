@extends('dashboard')

@section('content')
<h1>{{ $post->title }}</h1>
<p>{{ $post->body}}</p>

@if ($post->comments)
@foreach($post->comments as $comment)
<div class="comment">
<h4> {{ $comment->author }} </h4>
<p> {{ $comment->body }} </p>
</div>
@endforeach

<p> Comment count: {{ $post->comments()->count() }}
@endif

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="/comments/store" method="POST">
@csrf
<div class="form-input">
<input type="text" placeholder="Author name" name="author">
</div>
<div class="form-input">
<textarea name="body" placeholder="Comment body"></textarea>
</div>
<input type="hidden" value={{ $post->id }} name="commentable_id">
<input type="hidden" value={{ get_class($post) }} name="commentable_type">
<input type="submit">
</form>

@endsection