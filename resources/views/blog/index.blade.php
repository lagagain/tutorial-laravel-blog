@extends("base",['title'=>'網誌文章'])

@section('title', '網誌文章')


@section('body')
    <div class="container">
        <a href="{{route('blog/post.create')}}"><input class="btn btn-primary" name="" type="button" value="新增文章"/></a>
        <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{route('blog/post.show',['id'=>$post->id])}}">{{ $post->title }}</a>
                <form class="form-inline"
                      action="{{route('blog/post.destroy',['id'=>$post->id])}}"
                      method="post">
                    @csrf
                    @method('delete')
                    <input class="btn btn-danger" name="" type="submit" value="刪除"/>
                </form>
            </li>
        @endforeach
        </ul>
    </div>

    {{ $posts->links() }}
@endsection
