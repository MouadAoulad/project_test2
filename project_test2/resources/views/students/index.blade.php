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
            
            <h3>List Students of School <strong> {{ Session::get('school_name') }}</strong></h3>
            <br />

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->password }}</td>
                        <td>
                            <a href="/student/{{$student->id}}/delete" class="btn btn-danger pull-right">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if  (Session::get('user_role_id') === 1)
            <form method="post" action="/student/add">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" require >
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" require >
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" require >
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            @endif

        </div>
    </div>
</div>

<div class="clearfix"></div>



@stop