@extends('layouts.app')

@section('content')
<!-- <body> 
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <a href="{{ url('/edit') }}">Edit</a>
        </div>
    </div>
</body> -->
<!-- 
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/search') }}">TalentSearch</a>
                    <a href="{{ url('/forum') }}">Forum</a>
                    
                    @if (Auth::check())
                       <a href="{{ url('/edit') }}">Edit</a> 
                        <a href="{{ url('/home') }}">Profile</a>    
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                        
                    @endif
                </div>
            @endif
</div>
 -->
<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            {{--<div class="row">
                <div class="col-md-6">

                </div>
            </div>--}}
            <div class="panel panel-default">

                <div class="panel-heading">Profile</div>

                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-6">

                        <!--  Username: {{$authUser->user_name}}
                                </br> -->


                            </br>
                            Name: {{$authUser->name}}
                            </br>
                            Email: {{$authUser->email}}
                            </br>
                            Contact: {{$authUser->contact}}
                            </br>
                            Address: {{$authUser->adress}}
                            </br>
                        <!-- Image: {{$authUser->image}}
                                </br> -->
                            Achievement:
                            </br>
                            CV: <a href="{!! $authUser->CV !!}">Download CV</a>
                            </br>
                            Proffessional Skills:
                            @foreach($authUser->skills as $skill )
                                {{$skill->name}}
                            @endforeach

                            <br>
                            Volunteering Skills:
                            @foreach($authUser->volunteeringskill as $volunteskill )
                                {{$volunteskill->name}}
                            @endforeach

                        </div>

                        <div class="col-md-6">
                            <img src="{{asset($authUser->image) }}" alt="Mountain View" style="width:304px;height:228px;">
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
