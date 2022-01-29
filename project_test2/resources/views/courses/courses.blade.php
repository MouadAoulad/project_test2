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

            <h3>Courses | School <strong> {{ Session::get('school_name') }}</strong> </h3>
            <br />

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Teacher</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($current_courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->name }}</td>
                        <td>
                            @if  (Session::get('user_role_id') === 2)
                            <a href="/course/{{$course->id}}/delete" class="btn btn-danger pull-right">Delete</a>
                            @endif
                            <a href="/course/{{$course->id}}" class="btn btn-info pull-right" style="margin-right:10px;">Preview</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
            <h4> Add a new course</h4>
            <hr>
            @if  (Session::get('user_role_id') === 2)
            <form method="post" action="/course/add">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" >
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" >
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            @endif

        </div>
    </div>
</div>

<div class="clearfix"></div>

@stop