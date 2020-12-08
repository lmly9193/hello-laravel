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

// 預設
Route::get('/', function () {
    return view('welcome');
});

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);
//
// Route::any($uri, $callback);
// Route::match([$method,...], $uri, $callback);

// Closure(閉包)
Route::get('/Hello-World', function () {
    return 'Hello World';
});

// ============================================================
// 帶球
// http://localhost:8000/hello/Ethan
Route::get('/hello/{name}', function ($name) {
    return 'Hello, ' . $name;
});

//加上預設值
// http://localhost:8000/user/
// http://localhost:8000/user/Ethan
Route::get('/user/{name?}', function ($name = 'John') {
    return 'You\'re ' . $name;
});

// 使用物件Request
// http://localhost:8000/hello?name=Ethan
use Illuminate\Http\Request;
Route::get('/hello', function (Request $request) {
    return 'Hello, ' . $request->query('name');
});

// 正則表達式
// http://localhost:8000/number/27722272
// http://localhost:8000/number/string
Route::get('/number/{number}', function ($number) {
    return $number;
})->where(["number" => '[0-9]+']);

// 命名別名
Route::get('/Jefferson', function () {
    return '已查到使用者資料';
})->name('Jeff');

// 重新導向
// http://localhost:8000/redirect-1
// http://localhost:8000/redirect-2
Route::get('/redirect-1', function () {
    return redirect()->route('Jeff');
});
Route::redirect('/redirect-2', '/Hello-World');


// ============================================================
// 路由視圖
// http://localhost:8000/search/Ethan
Route::get('/search/{item}', function ($item) {
    return view("search", ["item" => $item]);
});
Route::view('/search', 'search', ["item" => "Default"]);


// ============================================================
// 請求
// http://localhost:8000/member/login

Route::get('/member/login', 'MemberController@index');
Route::post('/member/login', function (Request $request) {
  return $request->all();
});


// posts
Route::get('/posts', 'PostController@index');
Route::get('/post/create', 'PostController@create');
Route::post('/post', 'PostController@store');
Route::get('/post/{id}', 'PostController@show')->name('show-post');
Route::get('/post/{id}/edit', 'PostController@edit')->name('edit-post');
Route::put('/post/{id}', 'PostController@update')->name('update-post');
Route::delete('/post/{id}', 'PostController@destroy')->name('delete-post');

// search & list
Route::get('/list', 'SearchController@index');
Route::get('/result', function(){
  return abort('404');
});
Route::post('/result', 'SearchController@search');
Route::get('/result/{name}', 'SearchController@show');