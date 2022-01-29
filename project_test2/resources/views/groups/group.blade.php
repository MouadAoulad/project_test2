@extends('master')
@section('content')

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title"> 
                <div class="clearfix"></div>
                @if(count($errors->all()) > 0)
                    @foreach (Session::get('errors')->all() as $error)
                    <p class="bg-danger" style="padding:10px;">{{$error}}</p>
                    @endforeach
                @endif
            </div>

            <h2> School : {{ Session::get('school_name') }} </h2>
            <h3 style="display:inline;"> Group : {{ $group->name }} </h3>
            
            @if(!$join)
            <a href="/group/{{$group->id}}/join" class="btn btn-primary">Join Group</a>
            @endif

            <br>
            <h3> List of users in this group </h3>
            @foreach ($group->users as $user)
                <div>{{ $user->name }} |  {{ $user->email }}</div>
            @endforeach

            @if($join)
            <br><br>
            <h4> Posts </h4>
            <table class="table">
                <tbody>
                    <tr>
                    @foreach (collect($group->posts)->reverse() as $post)
                    <tr>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->date }}</td>
                        <td>Owner: {{ DB::table('users')->where("id", $post->user_id)->first()->name }}</td>
                        <td>
                            @if (Session::get('user_id') === $post->user_id)
                            <a href="/post/{{$post->id}}/delete" class="btn btn-danger pull-right">Delete</a>
                            <a href="/post/{{$post->id}}" class="btn btn-info pull-right" style="margin-right:10px;">Edit</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <h4> Add Post </h4>
            <form method="post" action="/post/add">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="3"></textarea>
                    <input type="hidden" value="{{ $group->id }}" class="form-control" name="group_id" >
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            @endif

        </div>
    </div>
</div>

<div class="clearfix"></div>



@stop