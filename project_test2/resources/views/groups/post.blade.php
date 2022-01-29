@extends('master')
@section('content')

<nav aria-label="breadcrumb" style="display:inline-block;">
    <ol class="breadcrumb" style="background-color:#fff; border-radius:30px; border:1px solid #73879C; margin-bottom:10px;">
        <li class="breadcrumb-item"><a href="/"><strong>Home</strong></a></li>
        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
    </ol>
</nav>

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
            
            <h2>Group : {{ $post->group->name }}</h2>
            <h3>Edit Post</h3>
            <form method="post" action="/post/update">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="3">{{ $post->content }}</textarea>
                    <input type="hidden" value="{{ $post->id }}" class="form-control" name="post_id" >
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>

<div class="clearfix"></div>



@stop