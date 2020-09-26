<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = array('id');
    
    //ヴァリデーション//
     public static $rules = array(
        'start_datetime' => 'required',
        'end_datetime' =>'required',
        'schedule' => 'required',
    );
    
}
