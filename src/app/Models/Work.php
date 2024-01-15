<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'work_start_time',
        'work_finish_time',
        'total_work_time'
    ];

    protected $hidden = [
        'created_time',
        'updated_time'
    ];

    public function user(){
        $this -> belongsTo('User::class');
    }
}
