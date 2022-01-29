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

            <h3>Groups | School <strong> {{ Session::get('school_name') }}</strong></h3>
            <br />

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($current_groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td>
                            @if  (Session::get('user_role_id') === 2)
                            <a href="/group/{{$group->id}}/delete" class="btn btn-danger pull-right">Delete</a>
                            @endif
                            <a href="/group/{{$group->id}}" class="btn btn-info pull-right" style="margin-right:10px;">Preview</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
            <h4> Add Group </h4>
            <hr>
            @if  (Session::get('user_role_id') === 2)
            <form method="post" action="/group/add">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" >
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
            @endif

        </div>
    </div>
</div>

<div class="clearfix"></div>

@stop
