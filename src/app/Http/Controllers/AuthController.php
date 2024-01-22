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
        return view('auth.stamp');
    }

    public function date(){
        $users = User::join('works', 'users.id', '=', 'works.user_id')->paginate(5);
        return view('auth.date',['users' => $users ,]);
    }
}
