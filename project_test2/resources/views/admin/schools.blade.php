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
            
            <h3>List Schools </h3>
            <br />

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schools as $school)
                    <tr>
                        <td>{{ $school->name }}</td>
                        <td>{{ $school->slug }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <form method="post" action="/school/add">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" require >
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug" require >
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>

        </div>
    </div>
</div>

<div class="clearfix"></div>



@stop