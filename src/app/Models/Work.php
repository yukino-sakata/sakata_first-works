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
        'work-start_at',
        'work-finish_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        $this -> belongsTo('User::class');
    }
}
