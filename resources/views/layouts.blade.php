<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Document</title>
	<link rel="stylesheet" href="/css/style.css">
	
	<!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
	@yield('header')
</head>
<body>
	<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/search') }}">TalentSearch</a>
                    <a href="{{ url('/forum') }}">Forum</a>
                    
                    @if (Auth::check())
                       <!-- <a href="{{ url('/edit') }}">Edit</a>  -->
                        <a href="{{ url('/home') }}">Home</a>    
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                        
                    @endif
                </div>
            @endif
    </div>
	@yield('content')


	@yield('footer')
</body>
</html>