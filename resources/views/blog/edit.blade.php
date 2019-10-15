@extends("base",['title'=>'編輯文章'])

@section('title', '編輯文章')


@section('body')
    <form method="post" action="{{($type=="edit") ?
                                  route("blog/post.update", ["id"=>$id]) :
                                  route("blog/post.store")}}">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        @method(($type=="edit")? "patch" : "post")

        <label for="title">標題：</label>
        <input name="title" type="text" value="{{$title}}" id="title" />
        <br/>
        <label for="content">內容：</label>
        <textarea cols="30" id="content" name="content" rows="10">{{$content}}</textarea>
        <br/>
        <input name="" type="submit" value="儲存"/>
    </form>
@endsection
