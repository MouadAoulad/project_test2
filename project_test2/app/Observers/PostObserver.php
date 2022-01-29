<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\Group;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {   
        Cache::forget('group'.\Session::get('user_id'));
        Cache::remember('group'.\Session::get('user_id'), now()->addSeconds(30), function () use ($post) {
            return Group::with('users')->with('posts')->where('id',$post->group_id)->orderBy('created_at', 'DESC')->first();
        });
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        Cache::forget('group'.\Session::get('user_id'));
        Cache::remember('group'.\Session::get('user_id'), now()->addSeconds(30), function () use ($post) {
            return Group::with('users')->with('posts')->where('id',$post->group_id)->orderBy('created_at', 'DESC')->first();
        });
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        Cache::forget('group'.\Session::get('user_id'));
        Cache::remember('group'.\Session::get('user_id'), now()->addSeconds(30), function () use ($post) {
            return Group::with('users')->with('posts')->where('id',$post->group_id)->orderBy('created_at', 'DESC')->first();
        });
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
