@extends('layout.header')

@section('page-title')
    Admin Home Page
@endsection

@section('main-content')
    @if(Session::has('status'))
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p> {{ Session::get('status') }}</p>
        </div>
    @endif
    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12">
                {{ $post->title }} 
                <a href="{{ route('admin.edit', ['id' => $post->id]) }}" class="btn btn-default">Edit</a> 
                <a href="{{ route('admin.delete', ['id' => $post->id]) }}" class="btn btn-danger">Delete</a>
            </div>
        </div>        
    @endforeach
@endsection