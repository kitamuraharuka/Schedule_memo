<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diary;
use App\Calendar\CalendarView;


class TopController extends Controller
{
public function index(Request $request)
  {
      
		$calendar = new CalendarView(time());
		
		$cond_diary = $request->cond_diary;
      if ($cond_diary != '') {
          // 検索されたら検索結果を取得する
          $posts = Diary::where('diary', $cond_diary)->get();
      } else {
          // それ以外はすべての日記を取得する
          $posts = Diary::all();
          $posts =Diary::orderBy('id', 'desc')-> paginate(5);
      }
      return view('index', ['posts' => $posts, 'cond_diary' => $cond_diary, "calendar" => $calendar]);
  }
  
  
  
  public function getSchedule(Request $request)
  {
    $day = $request ->input('day');
    
    //$schedules = Schedule::where('date', $day)->get();

       $schedules = [
            [
                "day" => $day,
                "time" => "19:00〜20:00",
                "schedule" => "メンタリング"
            ],
            [
                "day" => $day,
                "time" => "20:00〜21:00",
                "schedule" => "片付け"
            ]
        ];
        
        
        return response()->json($schedules);

  }
  

}

