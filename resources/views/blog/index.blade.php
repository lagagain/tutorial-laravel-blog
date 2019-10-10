@extends("base",['title'=>'網誌文章'])

@section('title', '網誌文章')


@section('body')
    <div class="container">
        <ul>
        @foreach ($posts as $post)
            <li><a href="{{route('blog/post.show',['id'=>$post->id])}}">{{ $post->title }}</a></li>
        @endforeach
        </ul>
    </div>

    {{ $posts->links() }}
@endsection
