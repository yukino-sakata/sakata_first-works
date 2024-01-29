<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Work;
use App\Models\Rest;
use Illuminate\Database\Eloquent\Collection;

class AuthController extends Controller

{
    public function index(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function stamp(Request $request){
        $user = Auth::User()->id;
        $date = Carbon::today();
        $work = Work::where('user_id', $user)->where('date',$date)->get();
        $openWork = Work::where('user_id', $user)->where('date',$date)->where('work_finish_time',)->get();
        $workId = Work::where('user_id', $user)->where('date',$date)->where('work_finish_time',)->first();

        if(count($openWork)>0){
        $rest = Rest::where('work_id',$workId->id)->where('rest_end_time',)->get();
        return view('auth.stamp')->with('openWork', $openWork)->with('rest', $rest)->with('work',$work);
        }
        elseif(count($work)>0){
        return view('auth.stamp')->with('openWork',$openWork)->with('work',$work);
        }
        else
        {
        return view('auth.stamp')->with('openWork', $openWork)->with('work',$work);
        }
    }

    public function date(){
        $users = User::join('works', 'users.id', '=', 'works.user_id')->paginate(5);
        return view('auth.date',['users' => $users ]);
    }
}
