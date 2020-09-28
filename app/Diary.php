<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $guarded = array('id');
    
    //ヴァリデーション//
    public static $rules = array(
        'diary' => 'required');
        
        
}
