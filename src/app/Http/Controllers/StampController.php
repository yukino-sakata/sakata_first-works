<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Work;
use App\Models\Rest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class StampController extends Controller
{
    public function stamp(){
        $user = Auth::User()->id;
        $date = Carbon::today();
        $date_param = $date->format('Y-m-d');
        $work = Work::where('user_id', $user)->where('date',$date)->get();
        $openWork = Work::where('user_id', $user)->where('date',$date)->where('work_finish_time',)->get();
        $workId = Work::where('user_id', $user)->where('date',$date)->where('work_finish_time',)->first();

        if(count($openWork)>0){
        $rest = Rest::where('work_id',$workId->id)->where('rest_end_time',)->get();
        return view('auth.stamp')->with('openWork', $openWork)->with('rest', $rest)->with('work',$work)->with('date',$date_param);
        }
//        elseif(count($work)>0){
//        return view('auth.stamp')->with('openWork',$openWork)->with('work',$work);
//        }
        else
        {
        return view('auth.stamp')->with('openWork',$openWork)->with('work',$work)->with('date',$date_param);
        }
    }
}
