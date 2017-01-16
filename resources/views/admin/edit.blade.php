@extends('layout.header')
@section('page-title')
    Edit <small>{{ $post->title }}</small>
@endsection

@section('main-content')
    @include('partials.errors')
    <form action="/admin/update" method="POST" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title:</label>
            <div class="col-sm-10">
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-sm-2 control-label">Content:</label>
            <div class="col-sm-10">
                <textarea name="content" class="form-control" rows="5">{!! $post->content  !!}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-sm-2 control-label">Tags:</label>
            <div class="col-sm-10">
                @foreach($tags as $tag)
                <label>
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag->id) ? 'checked' : '' }}> {{$tag->name}}
                </label>
                @endforeach
            </div>
        </div>
        <input type="hidden" name="postId" value="{{ $postId }}">
        {{ csrf_field() }}
        <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection