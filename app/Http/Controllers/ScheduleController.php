<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Calendar\CalendarView;
use App\Calendar\CalendarWeek;
use App\Calendar\CalendarWeekBlankDay;
use App\Calendar\CalendarWeekDay;

class ScheduleController extends Controller
{
   //新規作成画面　表示　
  public function add()
    {
        return view('schedule.register');
    }

//新規作成画面　新規作成
   public function create(Request $request)
   {
       //ヴァリデーションを行う　Diaryは/app/Diary.php
       $this->validate($request, Schedule::$rules);
       $schedule = new Schedule;
       $form = $request->all();
       
       
       //トークンの削除
       unset($form['_token']);
       
       
       //データベースに保存する
        $schedule ->fill($form);
        
            $schedule ->save();
       
       //リダイレクトする
       return redirect('/');
   }

//編集画面　表示
   public function edit(Request $request)
    {
        
        $schedule = Schedule::find($request->id);
        if (empty($schedule)){
            abort(404);
        }
        return view('schedule.edit', ['schedule_form' =>$schedule]);
    }
    
//編集画面 アップデート
    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Schedule::$rules);
      // News Modelからデータを取得する
      $schedule = Schedule::find($request->id);
      // 送信されてきたフォームデータを格納する
      $schedule_form = $request->all();
      
      
      unset($schedule_form['_token']);

      // 該当するデータを上書きして保存する
      $schedule->fill($schedule_form)->save();

      return redirect('/');
  }
  
  
//削除動作
   public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $schedule = Schedule::find($request->id);
      // 削除する
      $schedule->delete();
      return redirect('/');
  }  


}

