<?php

namespace App\Http\Controllers;
Use DB;
use App\Models\Course;
use App\Models\User;
use \App\Http\Requests\StoreCourseRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller {
    
    public function index(Request $request) {
        if(\Session::get('user_id')) {
            $current_school = \Session::get('user_school_id');
            $current_courses = [];
            //$courses = Course::all();
            $courses = DB::table('courses')
                ->join('users', 'users.id', '=', 'courses.owner_id')
                ->select('courses.id','courses.title','courses.description','courses.owner_id','users.name','users.email','users.password','users.school_id','users.role_id')
                ->get();
            foreach ($courses as $course){
                $owner = User::where('id','=',$course->owner_id)->first();
                if($owner->school->id == $current_school) $current_courses[] = $course;
            }
            return view('courses.courses',compact('current_courses'));
        } else {
            return view('login');
        }
    }

    public function delete(Request $request, $sub, $id) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 2) {
            Course::where('id', $id)->delete();
            return back();
        } else {
            return view('login');
        }
    }

    public function add(StoreCourseRequest $request) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 2) {
            $course = new Course();
            $course->title = $request->title;
            $course->description = $request->description;
            $course->owner_id = \Session::get('user_id');
            $course->save();
            return back();
        } else {
            return view('login');
        }
    }

    public function get(Request $request, $sub, $id) {
        if(\Session::get('user_id')) {
            $course = Course::with('users')->where('id',$id)->first();
            $join = false;
            if(\Session::get('user_role_id') == 3) {
                $ids = [];
                foreach ($course->users as $user) {                
                    $ids[] = $user->id;
                }
                if(in_array(\Session::get('user_id'), $ids)){
                    $join = true;
                }
            }

            return view('courses.course',compact('course','join'));
        } else {
            return view('login');
        }
    }

    public function join(Request $request, $sub, $id) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 3) {
            DB::table('course_user')->insert(
                array('user_id' => \Session::get('user_id'),
                    'course_id' => $id)
            );
            return back();
        } else {
            return view('login');
        }
    }

}
