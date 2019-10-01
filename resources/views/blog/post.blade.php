@extends("base",['title'=>$title]) {{-- 第二個參數可以傳遞變數給父模板，但是父模板改用插槽方式，須改用以下方式 --}}

@section('title', $title)


    @section('body')
        <h1>{{$title}}</h1>
        {!! $content !!}
    @endsection
