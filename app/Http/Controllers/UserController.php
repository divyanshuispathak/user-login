<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userLogin(Request $request){
        $data = $request->input();
        $request->session()->put('username', $data['username']);
        return redirect('/profile');
    }
}
