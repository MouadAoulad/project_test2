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
            <h3> Course : {{ $course->title }} </h3>
            <h4> Description : {{ $course->description }} </h4>
            <h4> Teacher : {{ DB::table('users')->where("id", $course->owner_id)->first()->name }} </h4>

            <hr>
            
            @if (Session::get('user_role_id') === 3)
                @if(!$join)
                <a href="/course/{{$course->id}}/join" class="btn btn-primary">Join Course </a>
                @endif
            @endif

            <h3> List of students in this course <span style="font-size:15px; color:red" >( Just students who can join ) </span></h3>
            @foreach ($course->users as $user)
                <div>{{ $user->name }} |  {{ $user->email }}</div>
            @endforeach
        </div>
    </div>
</div>

<div class="clearfix"></div>



@stop