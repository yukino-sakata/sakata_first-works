<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Rest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
        public function workStart(Request $request){
        $user = Auth::user();

        $dt = Carbon::now();
        $form = [
            'user_id' => $user->id,
            'date' => Carbon::today(),
            'work_start_time' => $dt->toTimeString(),
            'created_at' => $dt,
            'updated_at' => $dt,
        ];
        unset($form['_token']);
        Work::create($form);
        return redirect('stamp')->with(['work_start'=>$form]);
    }

    public function workFinish(Request $request){
        //勤務終了時間の更新//
        $user = Auth::user();
        $dt = Carbon::now();
        $date = Carbon::today();
        $work = Work::where('user_id', $user->id)->where('work_finish_time',)->where('date',$date)->first();
        $work -> update([
            'work_finish_time' => $dt->toTimeString(),
            'updated_at' => $dt,
        ]);

        //合計休憩時間の計算//
        $workId = $work -> id;
        $allRests = Work::find($workId)->rests()->get();
        $totalRestTime =0;
        foreach( $allRests as $allRest){
            $restTime = $allRest -> rest_time;
            $totalRestTime += strtotime($restTime);
        };

        //勤務時間の計算//
        $workStartTime = strtotime($work->work_start_time);
        $workFinishTime = strtotime($work->work_finish_time);
        //$workTime = date('H:i:s',$workFinishTime - $workStartTime - $totalRestTime -32400);
        $workTime = date('H:i:s',$workFinishTime - $workStartTime -32400);

        $work -> update([
            'work_time' => $workTime,
            //'total_rest_time' => $totalRestTime,
        ]);
        return redirect('stamp');
    }

}
