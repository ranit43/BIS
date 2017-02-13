<!DOCTYPE html>
<html>
<head>
    <title>  </title>
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
</head>
<body>
    <h1> Skill Hunting.</h1>
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
    <div class="well">
        <div class="row">
            <div class="col-md-6 col-md-offset-3"> 
                   Showing the Search Results with the selected skills:
                   <hr>
                   @foreach($users as $user)
                   <div class="showUser"> 
                   Name:  {!! $user->name !!}
                   </br>
                   Email: {!! $user->email !!}
                   </br>
                   Contact: {!! $user->contact !!}
                   </br>
                   Image: {!! $user->image !!}
                   </br>
                   CV: {!! $user->CV !!}
                   </br>
                   <!-- Proffessional Skills:  
                   @foreach($user->skills as $skill )
                   {{$skill->name}}
                   @endforeach -->
                   <hr>
                   </div>
                   @endforeach
            </div>
        </div>

        
    </div>

</body>
</html>
