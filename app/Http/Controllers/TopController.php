<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;

class TopController extends Controller

{
public function index(Request $request)
  {
      $cond_diary = $request->cond_diary;
      if ($cond_diary != '') {
          // 検索されたら検索結果を取得する
          $posts = Diary::where('diary', $cond_diary)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Diary::all();
          $posts =Diary::orderBy('id', 'desc')-> paginate(5);
      }
      return view('index', ['posts' => $posts, 'cond_diary' => $cond_diary]);
  }

}
    

