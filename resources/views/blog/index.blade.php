@extends("base",['title'=>'網誌文章'])

@section('title', '網誌文章')


    @section('body')
        <div class="container">
            <ul>
                @foreach ($posts as $post)
                    <li><a href="{{route("blog/post.show", ["id"=>$post->id])}}">{{ $post->title }}</a></li>
                @endforeach
            </ul>
        </div>


        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="?page={{$page-1}}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for($i=1; $i <= $total_pages; $i++)
                    <li class="page-item"><a class="page-link" href="?page={{$i}}">{{$i}}</a></li>
                @endfor
                <li class="page-item">
                    <a class="page-link" href="?page={{$page+1}}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

    @endsection
