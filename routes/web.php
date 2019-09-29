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
