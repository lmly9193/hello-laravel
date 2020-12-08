<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Search;

class SearchController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return View('search/index', [
      'title' => '搜尋'
    ]);
  }

  /**
   * Search POST
   * 
   * @param  int  $name
   * @return \Illuminate\Http\Response
   */
  public function search(Request $request)
  {
    $name = $request->name;
    return redirect("/result/$name");
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $name
   * @return \Illuminate\Http\Response
   */
  public function show($name)
  {
    $lists = Search::where('first_name', 'like', "%$name%")->orWhere('last_name', 'like', "%$name%")->paginate(30);
    // $lists = Search::all();

    return View('search/result', [
      'title' => "搜尋姓名內含有 $name 的清單",
      'lists' => $lists
    ]);
  }
}
