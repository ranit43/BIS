<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                     {{ config('app.name', 'Laravel') }}
                 </a>--}}

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/search') }}">Talent Search</a></li>

                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else

                        <li><a href="{{ url('/post') }}">Forum</a></li>

                        <li><a href="{{ url('/home') }}">Profile</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>

                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>

    <div class="well">
        Showing the Search Results with the selected skills:
        <hr>

        <div class="row">
            @foreach($users as $user)
                <div class="col-md-4">
                    <div class="thumbnail text-center">
                        <img class="img-circle" src="{{ asset( $user->image ) }}" style="width: 200px" alt="{{ $user->name  }}" >
                        <div class="caption">
                            <h3>{{ $user->name  }}</h3>
                            {{--<p>...</p>--}}
                            <p>Email: {!! $user->email !!}</p>
                            <p>Contact: {!! $user->contact !!}</p>
                            CV: <a href="{!! $user->CV !!}">Download CV </a>
                            <p>
                                Professional Skill:
                                @foreach($user->skills as $skill )
                                    <span class="badge badge-success">{{$skill->name}}</span>
                                @endforeach
                            </p>

                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>

                    {{--<div class="showUser">
                    <!-- {!! $user->image !!} -->

                        <div class="row">
                            <div class="col-md-6">
                                <br>
                                Name:  {!! $user->name !!}
                                </br>
                                Email: {!! $user->email !!}
                                </br>
                                Contact: {!! $user->contact !!}
                                </br>
                                CV: <a href="{!! $user->CV !!}">Download CV </a>
                                </br>
                                Prfessional Skill:
                                @foreach($user->skills as $skill )
                                    {{$skill->name}}
                                @endforeach


                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset( $user->image ) }}" alt="Mountain View" style="width:200px;height:200px;">
                            </div>

                        </div>
                        <hr>
                    </div>--}}
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>
