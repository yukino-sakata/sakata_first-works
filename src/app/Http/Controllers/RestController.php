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
        return redirect('stamp');
    }

    public function restEnd(Request $request){
        //休憩終了時間の更新対象を取得//
        $user = Auth::user()->id;
        $date = Carbon::today();
        $dt = Carbon::now();
        $work = Work::where('user_id',$user)->where('date',$date)->first();
        $rest = Rest::where('work_id',$work->id)->where('rest_end_time', )->first();

        //合計休憩時間の計算//
        $allRests = Rest::where('work_id',$work->id)->where('rest_end_time', )->get();            foreach($allRests as $allRest){
            $restStartTime = strtotime($allRest->rest_start_time);
            $restEndTime = strtotime($allRest->rest_end_time);
            $restTime = $restEndTime - $restStartTime;
        }
        $sumRestTime = date('H:i:s',strtotime($restTime));

        $rest -> update([
            'rest_end_time' => $dt->toTimeString(),
            'updated_at' => $dt,
            'total_rest_time' => $sumRestTime,
        ]);

        return redirect('stamp');
    }
}
