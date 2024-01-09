<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function stamp(Request $request){
        return view('auth.stamp',);
    }

    public function create(Request $request){
        $user = Auth::user();

        $form = [
            'user_id' => $user->id,
            'date' => Carbon::today(),
            'work-start_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        unset($form['_token']);
        Work::create($form);
        return redirect('stamp');
    }



}
