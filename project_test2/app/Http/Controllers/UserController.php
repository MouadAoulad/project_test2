<?php
namespace App\Http\Controllers;
Use DB;
use App\Models\User;
use Illuminate\Http\Request;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class UserController extends Controller {

    public function user(Request $request) {
        if(!\Session::get('user_id')) {
            $subdomain = Route::input('subdomain'); 
            if($subdomain !== \Session::get('subdomain')){
                return redirect::back()->withErrors(["You are not registered in this subdomain school <".$subdomain."> !"]);
            } else {
                return view('user.index');
            }
        } else {
            return view('user.index');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect('/');
    }

    public function getStudents(Request $request) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 1) {
            $students = User::with('school')
                ->where('school_id',\Session::get('user_school_id'))
                ->where('role_id',3)
                ->get();

            return view('students.index',compact('students'));
        } else {
            return view('login');
        }
    }

    public function addStudent(Request $request) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 1) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->school_id = \Session::get('user_school_id');
            $user->role_id = 3;
            $user->save();
            return back();
        } else {
            return view('login');
        }
    }

    public function getTeacher(Request $request) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 1) {
            $teachers = User::with('school')
                ->where('school_id',\Session::get('user_school_id'))
                ->where('role_id',2)
                ->get();

            return view('teachers.index',compact('teachers'));
        } else {
            return view('login');
        }
    }

    public function addTeacher(Request $request) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 1) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->school_id = \Session::get('user_school_id');
            $user->role_id = 2;
            $user->save();
            return back();
        } else {
            return view('login');
        }
    }

    public function deleteUser(Request $request, $sub, $id) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 1) {
            User::where('id', $id)->delete();
            return back();
        } else {
            return view('login');
        }
    }



}


