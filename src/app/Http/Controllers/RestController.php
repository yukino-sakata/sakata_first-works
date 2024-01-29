<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Rest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RestController extends Controller
{
    public function restStart(Request $request){
        $user = Auth::user()->id;
        $date = Carbon::today();
        $work = Work::where('user_id',$user)->where('date', $date)->first();
        $dt = Carbon::now();
        $form = [
            'work_id' => $work->id,
            'rest_start_time' => $dt->toTimeString(),
            'created_at' => $dt,
            'updated_at' => $dt,
        ];
        unset($form['_token']);
        Rest::create($form);
        return redirect('stamp')->with('message','休憩開始しました');
    }

    public function restEnd(Request $request){
        //休憩終了時間の更新//
        $user = Auth::user()->id;
        $date = Carbon::today();
        $dt = Carbon::now();
        $work = Work::where('user_id',$user)->where('date',$date)->first();
        $rest = Rest::where('work_id',$work->id)->where('rest_end_time', )->first();
        $rest -> update([
            'rest_end_time' => $dt->toTimeString(),
            'updated_at' => $dt,
        ]);

        //休憩時間の計算//
        $restStartTime = strtotime($rest->rest_start_time);
        $restEndTime = strtotime($rest->rest_end_time);
        $restTime = date('H:i:s',$restEndTime - $restStartTime - 32400);
        $rest -> update([
            'rest_time' => $restTime,
        ]);

        return redirect('stamp')->with('message','休憩終了しました');
    }
}
