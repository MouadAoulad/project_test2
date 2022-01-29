<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\School;

use Illuminate\Http\Request;

class AdminController extends Controller {
    
    public function getDirectors(Request $request) {
        $directors = User::with('school')->where('role_id',1)->get();
        $schools = School::All();
        return view('admin.directors',compact('directors','schools'));
    }

    public function addDirector(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->school_id = $request->school_id;
        $user->role_id = 1;
        $user->save();
        return back();
    }

    public function getSchools(Request $request) {
        $schools = School::All();
        return view('admin.schools',compact('schools'));
    }

    public function addSchool(Request $request) {
        $school = new School();
        $school->name = $request->name;
        $school->slug = $request->slug;
        $school->save();
        return back();
    }


}
