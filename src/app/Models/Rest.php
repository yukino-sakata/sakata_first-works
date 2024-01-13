<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_id',
        'date',
        'rest_start_time',
        'rest_end_time'
    ];

    protected $hidden = [
        'created_time',
        'updated_time'
    ];

    public function work(){
        $this -> belongsTo('Work::class');
    }
}
