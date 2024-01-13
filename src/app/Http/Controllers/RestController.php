<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RestController extends Controller
{
    public function restStart(Request $request){
        $date = Carbon::today();
        $work = Work::where('date', $date)->first();
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
        $dt =Carbon::now();
        $rest = Rest::where('rest_end_time', );
        $rest -> update([
            'rest_end_time' => $dt->toTimeString(),
            'updated_at' => $dt,
        ]);
        return redirect('stamp');
    }
}
