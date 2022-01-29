<?php

namespace App\Http\Controllers;
Use DB;
use App\Models\Group;
use App\Models\User;
use App\Models\Post;
use \App\Http\Requests\StoreGroupRequest;
use \App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;

class GroupsController extends Controller {
    
    public function index(Request $request) {
        if(\Session::get('user_id')) {
            $current_school = \Session::get('user_school_id');
            $current_groups = [];
            $groups = Group::all();
            foreach ($groups as $group) {
                foreach ($group->users as $user){
                    if($user_ = User::where('id','=',$user->id)->first())
                        if($user_->school->id == $current_school) 
                            $current_groups[$group->id] = $group;
                }
            }
            return view('groups.groups',compact('current_groups'));
        } else {
            return view('login');
        }
    }

    public function delete(Request $request, $sub, $id) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 2) {
            Group::where('id', $id)->delete();
            return back();
        } else {
            return view('login');
        }
    }

    public function add(StoreGroupRequest $request) {
        if(\Session::get('user_id') && \Session::get('user_role_id') == 2) {
            DB::beginTransaction();
            try {
                $group = new Group();
                $group->name = $request->name;
                $group->save();

                DB::table('group_user')->insert(
                    array('user_id' => \Session::get('user_id'),
                        'group_id' => $group->id)
                );
                
                DB::commit();
                return back();
            } catch (Exception $e) {
                DB::rollback();
                echo 'Exception reçue : ',  $e->getMessage(), "\n";
            }
        } else {
            return view('login');
        }
    }

    public function get(Request $request, $sub, $id) {
        if(\Session::get('user_id')) {
            //$group = Group::with('users')->with('posts')->where('id',$id)->orderBy('created_at', 'DESC')->first();
            $group = Cache::remember('group'.\Session::get('user_id'), now()->addSeconds(30), function () use ($id) {
                return Group::with('users')->with('posts')->where('id',$id)->orderBy('created_at', 'DESC')->first();
            });

            $ids = [];
            $join = false;
            foreach ($group->users as $user) {                
                $ids[] = $user->id;
            }
            if(in_array(\Session::get('user_id'), $ids)){
                $join = true;
            }
            return view('groups.group',compact('group','join'));
        } else {
            return view('login');
        }
    }

    public function join(Request $request, $sub, $id) {
        if(\Session::get('user_id')) {
            DB::table('group_user')->insert(
                array('user_id' => \Session::get('user_id'),
                    'group_id' => $id)
            );
            return back();
        } else {
            return view('login');
        }
    }

    public function addpost(StorePostRequest $request) {
        if(\Session::get('user_id')) {

            $words = array('bad_1','bad_2','bad_3');
            foreach ($words as $word) {
                if (stripos($request->content, $word) !== false) {
                    return back()->withErrors(["The post should not contain any vulgarity (bad words)"]);
                    return false;
                }
            }
            $post = new Post();
            $post->content = $request->content;
            $post->date = date("Y-m-d");
            $post->user_id = \Session::get('user_id');
            $post->group_id =  $request->group_id;
            $post->save();
            return back();
        } else {
            return view('login');
        }
    }

    public function editpost(Request $request, $sub, $id) {
        if(\Session::get('user_id')) {
            $post = Post::with('group')->where('id',$id)->first();
            return view('groups.post',compact('post'));
        } else {
            return view('login');
        }
    }

    public function updatepost(Request $request) {
        if(\Session::get('user_id')) {
            $post = Post::where('id',$request->post_id)->first();
            $post->content = $request->content;
            $post->save();
            return back();
        } else {
            return view('login');
        }
    }

    public function deletePost(Request $request, $sub, $id) {
        if(\Session::get('user_id')) {
            Post::where('id', $id)->delete();
            return back();
        } else {
            return view('login');
        }
    }

}
