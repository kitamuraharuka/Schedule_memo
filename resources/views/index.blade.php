@extends('layouts.schememo')
{{-- カレンダー --}}
@section('contents')
<div class="container">
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
</div>
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