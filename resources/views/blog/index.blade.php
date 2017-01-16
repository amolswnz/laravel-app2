@extends('layout.header')

@section('page-title')
    Welcome to My Blog
@endsection

@section('main-content')
    <?php $count=0; ?>
    @foreach($posts as $post)
        <div class="col-md-4">
            <?php $count++ ?>
            <h3>{{ $post->title }}</h3>
            <p>{!! substr($post->content, 0, 161) !!}</p>
            <p> @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </p>
            <a class="btn btn-default" href="{{ route('blog.post', ['id' => $post->id]) }}" role="button">Read more</a>
        </div>
        @if($count % 3 == 0)
            <div class="clearfix"></div>
        @endif
    @endforeach
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                {{ $posts->links() }}
            </div>
        </div>    
@endsection