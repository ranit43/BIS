@extends('layouts.app')

@section('content')
<!-- <body> 
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <a href="{{ url('/edit') }}">Edit</a>
        </div>
    </div>
</body> -->
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

<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>


                <div class="panel-body">
                    Image:
                    </br>
                    Username:
                    </br>
                    Name: {{$authUser->name}}
                    </br>
                    Email: {{$authUser->email}}
                    </br>
                    Contact:
                    </br>
                    Address:
                    </br>
                    Achievement:
                    </br>
                    CV:
                    </br>
                    Volunteering Skills:
                    </br>

                   Proffessional Skills:  
                   @foreach($authUser->skills as $skill )
                   {{$skill->name}}
                   @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
