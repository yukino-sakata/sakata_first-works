<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
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
        return redirect('stamp');
    }

    public function workFinish(Request $request){
        $user = Auth::user();
        $dt =Carbon::now();
        $rest = Work::where('user_id', $user->id);
        $rest -> update([
            'work_finish_time' => $dt->toTimeString(),
            'updated_at' => $dt,
        ]);
        return redirect('stamp');
    }

}
