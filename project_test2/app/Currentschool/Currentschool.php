<?php

namespace App\Http\Controllers;
namespace App\Currentschool;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use \App\Http\Requests\LoginPostRequest;

Use DB;
use App\Models\User;
use App\Models\School;


class Currentschool {

    public static function process(LoginPostRequest $request){
        // En se basant => Directeur //
        $subdomain = $request->subdomain;
        if($school = DB::table('schools')->where('slug',$request->subdomain)->first()){
            if($user = User::where('email',$request->email)->where('password',$request->password)->where('school_id',$school->id)->first()){
                $request->session()->put('user_id', $user->id);
                $request->session()->put('user_name', $user->name);
                $request->session()->put('user_email', $user->email);
                $request->session()->put('user_role_id', $user->role->id);
                $request->session()->put('school_name', $school->name);
                $request->session()->put('user_school_id', $user->school_id);
                $request->session()->put('subdomain', $subdomain);
                //return view('user.index');
                return redirect('/user');
            }else {
                return redirect::back()->withErrors(["User doesn't exist!"]);
            }
        } else {
            return redirect::back()->withErrors(["Subdomaine school <".$subdomain."> doesn't exist!"]);
        }
    }

}