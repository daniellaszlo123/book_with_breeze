<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LendingController extends Controller
{
    
    public function auth_user_copies(){
        $user = Auth::user();	//bejelentkezett felhasználó
        $copies = Lending::with('lending_user')->where('user_id','=',$user->id)->get();
        return $copies;
    }

    

    public function show($user, $copy, $start)
    {
        $lending = Lending::where('user_id','=',$user)->where('copy_id', '=',$copy)->where('start', '=',$start)->get();
        return $lending[0];
    }


}
