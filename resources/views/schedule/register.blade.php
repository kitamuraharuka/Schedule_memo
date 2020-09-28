@extends('layouts.schememo')
@section('title', 'スケジュール新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>スケジュール新規登録</h2>
                <form action="{{ action('ScheduleController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                     <form class="form-inline">
                           
                        <div class="form-group row">
                            <label class="col-md-2">開始時刻</label>
                            <div class="col-md-10">
                                <input type="datetime-local"class="form-control" name="start_datetime" value="format('Y-m-d\TH:i') " >
                            </div>
                        </div>
                    
                         <div class="form-group row">
                            <label class="col-md-2">終了時刻</label>
                            <div class="col-md-10">
                                <input type="datetime-local" class="form-control" name="end_datetime" value="format('Y-m-d\TH:i') " >
                            </div>
                        </div>
                    </form>
                    
                        <div class="form-group row">
                            <label class="col-md-2">スケジュール</label>
                            <div class="col-md-10">
                                <input type="string" class="form-control" name="schedule">
                            </div>
                        </div>
                  
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection