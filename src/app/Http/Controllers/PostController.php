<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;


class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::all();
    
    return View('post/index',[
      'title'=> 'My Blog',
      'posts'=> $posts
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return View('post/create',[
      'title'=> '新增文章'
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
    $request->validate([
      'title' => ['required', 'unique:posts', 'max:255'],
      'content' => ['required'],
    ]);
    
    // 等價
    // $request->validate([
    //   'title' => 'required|unique:posts|max:255',
    //   'body' => 'required',
    // ]);

    $input = $request->all();

    $post = new Post;
    $post->title = $input['title'];
    $post->content = $input['content'];
    $post->save();

    return redirect('/posts');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // $post = Post::find($id);
    $post = Post::findOrFail($id);

    return View('post/show', [
      'title' => 'My Blog - ' . $post->title,
      'post' => $post
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
    $post = Post::findOrFail($id);

    return View('post/edit', [
      'title' => '編輯文章',
      'post' => $post
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
    // $input = Input::all();

    $input = $request->all();

    $post = Post::findOrFail($id);
    $post->title = $input['title'];
    $post->content = $input['content'];
    $post->save();

    // return redirect('/show-post', $id);
    return redirect('/posts');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $post = Post::findOrFail($id);
    $post->delete();

    return redirect('/posts');
  }
}
