@extends('layouts.schememo')
{{-- カレンダー --}}
@section('contents')
<div class="container">
    <div class="col-md-4">
                <a href="{{ action('ScheduleController@add') }}" role="button" class="btn btn-primary">スケジュール登録</a>
        　</div>
   <div class="row justify-content-center">
       <div class="col-lg-8">
           <div class="card">
               <div class="card-header">{{ $calendar->getTitle() }}</div>
               <div class="card-body">
					{!! $calendar->render() !!}
               </div>
           </div>
       </div>
   </div>
   <div class="day_schedule"></div>
</div>
<style>
    .day {
        cursor: pointer;
    }
</style>

<script type="text/javascript">
/*global $*/ 

     $(function() {
        $('.day').on('click', function () {
            let day = $('.card-header').text() + $(this).text() + '日';
            alert('日付' + day + 'がクリックされました。'+'予定');
            
            
            
           $.ajax({
                url: "/getSchedule",
                data: "day=" + day,
                success: function(response){
                    console.log(response);
                    $('.day_schedule').html('<p>' + response[0]['day'] + 'の予定</p>' );
                    
                    $.each(response, function(index, val) {
                        console.log(val);
                        $('.day_schedule p').append('<br><span>' + val['time'] + '：' + val['schedule'] + '</span>');
                        
                      
                    })
                }
            });
        })
    });

</script>

@endsection

{{-- 日記 --}}
@section('content')
    <div class="container mt-4">
        
     　 　<div class="col-md-4">
                <a href="{{ action('DiaryController@add') }}" role="button" class="btn btn-primary">日記投稿</a>
        　</div>
        @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    <div style="text-align: right"> 
                         <a href="{{ action('DiaryController@edit', ['id' => $post->id]) }}">編集</a>
                         <a href="{{ action('DiaryController@delete', ['id' => $post->id]) }}">削除</a>
                    </div>
                    <p class="card-text">
                        {!! nl2br(e(str_limit($post->diary, 200))) !!}
                    </p>
                </div>
                
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $post->created_at->format('Y.m.d H:i') }}
                    </span>
                </div>
                
            </div>
        @endforeach
         {{ $posts->appends(request()->input())->links() }}
    </div>
@endsection