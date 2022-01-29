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

            <h1> Profile </h1>
            <hr>
            
            @if (Session::get('user_role_id') === 1)
                <h2> Director : {{ Session::get('user_name') }} </h2>
            @elseif  (Session::get('user_role_id') === 2)
                <h2> Teacher : {{ Session::get('user_name') }} </h2>
            @else
                <h2> Students : {{ Session::get('user_name') }} </h2>
            @endif
            
            <h3> user_email : <small> {{ Session::get('user_email') }} </small></h3>
            <h3> Name : <small> {{ Session::get('school_name') }} </small></h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>



@stop