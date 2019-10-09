<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\BlogPost;
use Parsedown;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offset = $request->query("offset", 0);
        $limit = $request->query("limit", 30);
        $page = $request->query("page");

        if($page){
            $offset = ($page - 1) * $limit;
        }else{
            $page = ($offset / $limit) + 1;
        }

        $request->merge([
            "offset" => $offset,
            "page" => $page,
        ]);

        $posts = BlogPost::orderBy('id','ASC')
                    ->offset($offset)
                    ->limit($limit)
                    ->get();

        $post_cnt = BlogPost::all()->count();
        $total_pages = ($limit + $post_cnt - 1) / $limit;

        return view("blog/index",[
            "posts"=>$posts,
            "page"=>$page,
            "total_pages" => $total_pages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog/edit',[
            'title' => '未命名文章',
            'content' => '',
            'type' => 'create,'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input("titile", "未命名文章");
        $content = $request->input("content");

        $post = new BlogPost;
        $post->title = $title;
        $post->content = $content;
        $id = $post->save();

        Log::info("Store New Blog Post: id = $id");

        return redirect()->action(
            'Blog\PostController@show', ['id' => $id]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $post = BlogPost::find($id);

        if(! $post){
            abort(404);
        }

        $content = $post->content;

        {
            $Parsedown = new Parsedown();
            $content = $Parsedown->text($content);
        }

        return view("blog.post", [
            "title" => $post->title,
            "content" => $content,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::find($id);

        return view('blog/edit',[
            'id' => $id,
            'title' => $post->title,
            'content' => $post->content,
            'type' => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = BlogPost::find($id);

        if(! $post){
            abort(403);
        }

        $title = $request->input("title", "未命名文章");
        $content = $request->input("content");

        $post->title = $title;
        $post->content = $content;
        $post->update();


        Log::info("Update Blog Post, the id is $id");

        return redirect()->action(
            'Blog\PostController@show', ['id' => $id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPost::find($id);

        if(! $post){
            abort(403);
        }

        $post->delete();

        Log::info("Delete Blog Post, the id is $id");

        return redirect()->action('PostController@index');
    }
}
