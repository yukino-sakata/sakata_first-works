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
        if(empty($action)){
            $today = Carbon::today()->format('Y-m-d');
            $date = $today;

        }elseif($action === 'prev'){
            $dt = new DateTime($request->date);
            $date = $dt->modify('-1day')->format('Y-m-d');

        }elseif($action === 'next'){
            $dt = new DateTime($request->date);
            $date = $dt->modify('+1day')->format('Y-m-d');
        }
            $users = User::join('works', 'users.id', '=', 'works.user_id')->where('date',$date)->paginate(5);
            return view('auth.date',['users' => $users ])->with('date',$date);

    }

//    public function datePrev(Request $request){

  //  }

    //public function dateNext(Request $request){

//    }
}
