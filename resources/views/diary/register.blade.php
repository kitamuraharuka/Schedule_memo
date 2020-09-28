@extends('layouts.schememo')
@section('title', '日記新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>日記新規作成</h2>
                
                <form action="{{ action('DiaryController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">今日の感想</label>
                        <div class="col-md-10">
                            <input type="string" class="form-control" name="diary" value="{{ old('diary') }}">
                        </div>
                    </div>
                  
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection