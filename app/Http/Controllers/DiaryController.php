<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;


class DiaryController extends Controller
{
//新規作成画面　表示　
  public function add()
    {
        return view('diary.register');
    }

//新規作成画面　新規作成
   public function create(Request $request)
   {
       //ヴァリデーションを行う　Diaryは/app/Diary.php
       $this->validate($request, Diary::$rules);
       $diary = new Diary;
       $form = $request->all();
       
       
       //トークンの削除
       unset($form['_token']);
       
       
       //データベースに保存する
       $diary ->fill($form);
       $diary ->save();
       
       //リダイレクトする
       return redirect('/');
   }

//編集画面　表示
   public function edit(Request $request)
    {
        
        $diary = Diary::find($request->id);
        if (empty($diary)){
            abort(404);
        }
        return view('diary.edit', ['diary_form' =>$diary]);
    }
    
//編集画面 アップデート
    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Diary::$rules);
      // News Modelからデータを取得する
      $diary = Diary::find($request->id);
      // 送信されてきたフォームデータを格納する
      $diary_form = $request->all();
      unset($diary_form['_token']);

      // 該当するデータを上書きして保存する
      $diary->fill($diary_form)->save();

      return redirect('/');
  }
  
  
//削除動作
   public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $diary = Diary::find($request->id);
      // 削除する
      $diary->delete();
      return redirect('/');
  }  


}
