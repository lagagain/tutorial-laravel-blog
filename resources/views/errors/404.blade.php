@extends("base",['title'=>'哎呀，找不著頁面'])

@section('title', '哎呀，找不著頁面')


@section('body')
    <h1>404錯誤 - 找不著頁面</h1>
    <b>哎呀，找不著頁面</b>
    <p>
        <ul>
            <li><a href="/">點擊我，回到首頁</a></li>
            <li><a href="{{route('blog/post.index')}}">我的網誌</a></li>
        </ul>
    </p>
@endsection
