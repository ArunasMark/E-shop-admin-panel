<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-image: url("{{asset('images/main bg.jpg')}}");
            -moz-background-size: 100% 100%; /* Firefox 3.6+ */
            -webkit-background-size: 100% 100%; /* Safari 3.1+ ir Chrome 4.0+ */
            -o-background-size: 100% 100%; /* Opera 9.6+ */
            background-size: 100% 100%;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 25px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        a {
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            margin-right: 40px;
            border: 1px solid whitesmoke;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth

                @if(Auth::user()->isDisabled())
                    <strong>  <a href="{{ url('/') }}" style="color: white; text-decoration: none">Main</a></strong>
                @elseif(Auth::user()->isUser())
                    <strong>  <a href="{{ url('/user/index') }}" style="color: white; text-decoration:
                    none">User page</a></strong>
                    <strong>  <a href="{{ url('/') }}" style="color: white; text-decoration: none">Main</a></strong>
                @elseif(Auth::user()->isVisitor())
                    <strong>   <a href="{{ url('/') }}" style="color: white; text-decoration: none">Main</a></strong>
                @elseif(Auth::user()->isAdministrator())
                    <strong><a href="{{ url('/admin/index') }}" style="color: white; text-decoration: none; cursor:
                     pointer">Admin panel</a></strong>
                    <strong> <a href="{{ url('/') }}" style="color: white; text-decoration: none">Main</a></strong>
                @endif

                <strong>
                    <a class="dropdown-item" href="{{ route('logout') }}" style="color: white; text-decoration: none"
                       onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </strong>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            @else
                <strong>
                    <a href="{{ route('login') }}" style="color: white; text-decoration: none">Login</a>
                </strong>

                @if (Route::has('register'))
                    <strong>
                        <a href="{{ route('register') }}" style="color: white; text-decoration: none">Register</a>
                    </strong>
                @endif
            @endauth


        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">

        </div>

        <div class="links">

        </div>
    </div>
</div>
</body>
</html>