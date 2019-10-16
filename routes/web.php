<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\Http\Requests\ImageUpload;

Route::get('/', function () {
    return '<h1>Hello</h1>';
});

Route::any('/hello-world/', function () {
    return '<h1>Hello, World</h1>';
})->name("hello-world");

Route::get('/hello/{name?}', function ($name="World") {
    return view("hello-name", [
        "name" => $name,
    ]);
});

Route::get('/number/{number}', function ($number) {
    return $number;
})->where(["number"=>'[0-9]+'])
  ->name("just test number");

Route::get('redirect', function() {
    // 通过路由名称进行重定向
    return redirect()->route('hello-world');
});

Route::group(['prefix' => 'blog',
              'as' => 'blog/',
              'namespace' => 'Blog', ],

             function(){
                 // Route::get('/post/{post_id}', "ExamplePostController@show");
                 Route::resource('/post',"PostController");
              });

Route::get('/images/upload', function(){
    return view('images/upload');
});

Route::post('/images/upload', function(ImageUpload $request){

    if($request->hasFile('file')){
        $image = $request->file('file');
        $file_path = $image->store('public');
    }

    return redirect(Storage::url($file_path));
})->name('image.upload');
