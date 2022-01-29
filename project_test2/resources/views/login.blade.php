<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    </head>
    <style>
        
        @use postcss-cssnext;
        /* helpers/align.css */

        body{
            background-color: #f8f8f8;
        }

        .align {
        align-items: center;
        display: flex;
        justify-content: center;
        }

        /* helpers/grid.css */

        :root {
        --gridMaxWidth: 24em;
        --gridWidth: 90%;
        }

        .grid {
        margin-left: auto;
        margin-right: auto;
        margin-top: 50px;
        max-width: var(--gridMaxWidth);
        width: var(--gridWidth);
        background: #fff;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.26);
        }

        /* helpers/icon.css */

        .icon {
        display: inline-block;
        height: 1.25em;
        line-height: 1.25em;
        margin-right: 0.625em;
        text-align: center;
        vertical-align: middle;
        width: 1.25em;
        }

        .icon--info {
        background-color: #e5e5e5;
        border-radius: 50%;
        }

        .login__header {
        background-color: #4D7ABA;
        color: #fff;
        padding: 1.5em;
        text-align: center;
        text-transform: uppercase;
        }

        .login__title {
        font-size: 1rem;
        margin: 0;
        }

        .login__body {
        background-color: #fff;
        padding: 1.5em 1.5em 0;
        position: relative;
        }

        .login__body::before {
        background-color: #fff;
        content: '';
        height: 0.5em;
        left: 50%;
        margin-left: -0.25em;
        margin-top: -0.25em;
        position: absolute;
        top: 0;
        transform: rotate(45deg);
        width: 0.5em;
        }

        .login input[type='email'],
        .login input[type='password'] {
        border: 0.0625em solid #e5e5e5;
        padding: 1em 1.25em;
        }

        .login input[type='email'] {
        }

        .login input[type='password'] {
        border-top: 0;
        }

        strong{font-size: 12px;}

        .login input[type='submit'],.login input[type='button'] {
        background-color: #2d2d2d;
        color: #fff;
        order: 1;
        padding: 0.75em 1.25em;
        transition: background-color 0.3s;
        width: 100%;
        }

        .login input[type='button']:focus,
        .login input[type='button']:hover,
        .login input[type='submit']:focus,
        .login input[type='submit']:hover {
         /*background-color: #cd6e6e;*/
        }

        .form-field{
            margin-bottom: 10px;
        }

        .login__footer {
        align-items: center;
        background-color: #fff;
        border-bottom-left-radius: var(--loginBorderRadius);
        border-bottom-right-radius: var(--loginBorderRadius);
        justify-content: space-between;
        padding-bottom: 1.5em;
        padding-left: 1.5em;
        padding-right: 1.5em;
        }

        .login__footer p {
        margin: 0;
        display: block;
        margin-bottom: 15px;
        }

        .login__footer span {
            font-size: 13px;
        }

    </style>
    <body>
        <div class="grid">
        
            @if(count($errors->all()) > 0)
                @foreach (Session::get('errors')->all()  as $error)
                    <p class="bg-danger" style="padding:10px;">{{$error}}</p>
                @endforeach
            @endif
            
            <form action="/login" method="post" class="form login">

                {{ csrf_field() }}
                <header class="login__header">
                    <h3 class="login__title">Login</h3>
                </header>

                <div class="login__body">
                    <div class="form-field">
                        <input type="text" class="form-control" name="email" placeholder="email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-field">
                        <input type="password" class="form-control" name="password" placeholder="mot de passe">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div> 
                </div>

                <footer class="login__footer">
                    <p></p>
                    <input type="submit" value="Login">
                </footer>

            </form>
        </div>
    </body>
</html>