@extends('dashboard')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="/posts/edit/{{$post->id}}" method="post">
@csrf
Title : <input type="text" name="title" value="{{ $post->title }}"><br>
Body : <input type="text" name="body" value="{{ $post->body }}"><br>
Author : <input type="text" name="author_name" value="{{ $post->author_name }}"><br>
<input type="submit">
<input type="submit">
</form>
@endsection