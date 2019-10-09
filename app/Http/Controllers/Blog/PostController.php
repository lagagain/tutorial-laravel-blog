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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "title" => $post->titile,
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
        //
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

        $title = $request->input("titile", "未命名文章");
        $content = $request->input("content");

        $post->title = $title;
        $post->content = $content;

        $post->update();

        Log::info("Update Blog Post, the id is $id");

        return redirect()->action(
            'PostController@show', ['id' => $id]
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
