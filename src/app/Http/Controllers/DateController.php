<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use DateTime;

class DateController extends Controller
{
    public function date(Request $request){
        $action = $request->select;
        $date_param = $request->date;
        $appends_param = [];
        $dt = [];


        if(empty($action)){
            $date = Carbon::today()->format('Y-m-d');
            $appends_param['date'] = $date_param;

        }elseif($action === 'prev'){
            $dt = new DateTime($date_param);
            $date = $dt->modify('-1day')->format('Y-m-d');
            $appends_param['date'] = $date_param;

        }elseif($action === 'next'){
            $dt = new DateTime($date_param);
            $date = $dt->modify('+1day')->format('Y-m-d');
            $appends_param['date'] = $date_param;

        }
            $users = User::join('works', 'users.id', '=', 'works.user_id')->where('date',$date_param)->paginate(5);
            $users->appends($appends_param);
            var_dump($date_param);
            return view('auth.date',['users' => $users ])->with('date',$date)->with('date_param',$date_param);


    }
}
