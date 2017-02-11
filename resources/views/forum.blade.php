

<!DOCTYPE html>
<html>
<head>
	<title>  </title>
</head>
<body>
Forum page.
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/search') }}">TalentSearch</a>
                    <a href="{{ url('/forum') }}">Forum</a>
                    
                    @if (Auth::check())
                       <!-- <a href="{{ url('/edit') }}">Edit</a>  -->
                        <a href="{{ url('/home') }}">Profile</a>    
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                        
                    @endif
                </div>
            @endif
</div>
</body>
</html>