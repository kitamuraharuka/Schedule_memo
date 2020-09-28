@extends('layouts.schememo')
@section('title', 'スケジュール編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>スケジュール編集</h2>
                <form action="{{ action('ScheduleController@update') }}" method="post" enctype="multipart/form-data">
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
                            <input type="datetime-local" class="form-control" name="start_datetime"  value="{{ old('start_datetime') }}">
                        </div>
                    </div>
                    
                     <div class="form-group row">
                        <label class="col-md-2">終了時刻</label>
                        <div class="col-md-10">
                            <input type="datetime-local" class="form-control" name="end_datetime"value ="{{ old('end_datetime') }}">
                        </div>
                    </div>
                </form>

                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $diary_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection