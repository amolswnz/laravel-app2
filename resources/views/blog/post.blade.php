@extends('layout.header')

@section('page-title')
    {{ $post['title'] }}
@endsection

@section('main-content')
    {!! $post['content'] !!}
    <p> @foreach($post->tags as $tag)
            <span class="label label-default">{{ $tag->name }}</span>
        @endforeach
    </p>
    <p>{{ count($post->likes) }} Likes <a href="{{ route('blog.post.like', ['id' => $post->id]) }}" class="btn btn-default">Like</a> </p>
@endsection