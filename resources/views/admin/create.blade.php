@extends('layout.header')
@section('page-title')
    Create 
@endsection

@section('main-content')
<form action="/admin/create" method="POST" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
            <input type="text" name="title" id="title" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">Content:</label>
        <div class="col-sm-10">
            <input type="text" name="content" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">Tags:</label>
        <div class="col-sm-10">
            @foreach($tags as $tag)
                <label>
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->name}}
                </label>
            @endforeach
        </div>
    </div>
    {{csrf_field()}}
    <div class="col-sm-10 col-sm-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
@endsection