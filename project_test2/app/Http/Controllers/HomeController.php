<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    public function index(Request $request) {
        
        if(\Session::get('user_id')) {
            return view('user.index');
        } else {
            return view('login');
        }
        
    }

}
