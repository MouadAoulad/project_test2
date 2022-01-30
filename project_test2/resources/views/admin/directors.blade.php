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
            
            <h3>List Directors </h3>
            <br />

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">School</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($directors as $director)
                    <tr>
                        <td>{{ $director->name }}</td>
                        <td>{{ $director->email }}</td>
                        <td>{{ $director->password }}</td>
                        <td>{{ DB::table('schools')->where("id", $director->school_id)->first()->name }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <form method="post" action="/director/add">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" require >
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" require >
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" require >
                    <label>School</label>
                    <div class="form-group">
                        <select class="form-control" name="school_id">
                            @foreach ($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add new director</button>
            </form>

        </div>
    </div>
</div>

<div class="clearfix"></div>

@stop
