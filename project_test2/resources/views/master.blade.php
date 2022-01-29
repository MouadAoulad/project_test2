<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
    <title>Application de gestion scolaire</title>

    <!-- Css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>

  <body>
    
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav" style="margin-top:10px">
              @if (!Session::get('user_role_id'))
              <li><a href="/schools"><i class="fa fa-tachometer" aria-hidden="true"></i><span>Schools</span></a></li>
              <li><a href="/directors"><i class="fa fa-tachometer" aria-hidden="true"></i><span>Directors</span></a></li>
              @endif

              @if (Session::get('user_role_id') === 1)
              <li><a href="/user"><i class="fa fa-cogs" aria-hidden="true"></i><span>Profil</span></a></li>
              <li><a href="/teachers"><i class="fa fa-envelope" aria-hidden="true"></i><span>Teachers</span></a></li>
              <li><a href="/students"><i class="fa fa-cogs" aria-hidden="true"></i><span>Students</span></a></li>
              @endif

              @if (Session::get('user_role_id') === 3 || Session::get('user_role_id') === 2)
              <li><a href="/user"><i class="fa fa-cogs" aria-hidden="true"></i><span>Profil</span></a></li>
              <li><a href="/courses"><i class="fa fa-tachometer" aria-hidden="true"></i><span>Courses</span></a></li>
              <li><a href="/groups"><i class="fa fa-calendar" aria-hidden="true"></i><span>Groups</span></a></li>
              @endif

              @if (Session::get('user_role_id'))
              <li><a href="/logout"><i class="fa fa-cogs" aria-hidden="true"></i><span>Logout</span></a></li>
              @endif

              
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-light bg-light" style="background:#ebebeb;">
              <span class="navbar-brand mb-0">
              @if (Session::get('user_role_id') === 1)
                  Director : {{ Session::get('user_name') }}
              @elseif  (Session::get('user_role_id') === 2)
                  Teacher : {{ Session::get('user_name') }}
              @else
                  Students : {{ Session::get('user_name') }}
              @endif
              <span>|</span>
              </span>
              <span class="navbar-brand mb-0">School : {{ Session::get('school_name') }}</span>
            </nav>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
    
    <script>
      $(document).ready(function() {
          
          //$('#myTable').DataTable();
          
      });
    </script>
    
  </body>
</html>