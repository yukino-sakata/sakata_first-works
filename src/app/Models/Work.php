<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rest;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'work_start_time',
        'work_finish_time',
        'work_time',
        'total_rest_time'
    ];

    protected $hidden = [
        'created_time',
        'updated_time'
    ];

    public function user(){
        return $this -> belongsTo('User::class');
    }

    public function rests(){
        return $this -> hasMany('App\Models\Rest');
    }

}
