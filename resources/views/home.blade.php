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


                            <br>
                            Name: {{$authUser->name}}
                            <br>
                            Email: {{$authUser->email}}
                            <br>
                            Contact: {{$authUser->contact}}
                            <br>
                            Address: {{$authUser->adress}}
                            <br>
                        <!-- Image: {{$authUser->image}}
                                </br> -->

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
                            <br>
                            <br>
                            <br>
                            Achievement:
                            <br>
                            <br>
                            <a href="{{ route('achievement.create') }}">ADD YOUR ACHIEVEMENTS </a>
                            <br>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>AchievementID</th>
                                    <th>Title</th>
                                    <th>Issuer</th>
                                    <th>Year</th>
                                    <th>Details</th>
                                    <th>UserID</th>
                                    <th>User</th>
                                    <th>#</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($achievements))
                                    @foreach($achievements as $achievement)
                                        <tr>
                                            <td>{{ $achievement->id }}</td>
                                            {{--<td><a href="{{ route('achievement.show_achievement', $achievement->id) }}">{{ $achievement->title }}</a> </td>--}}
                                            <td>{{ $achievement->title }} </td>
                                            <td>{{ $achievement->issuer }}</td>
                                            <td>{{ $achievement->year }}</td>
                                            <td>{{ $achievement->details }}</td>
                                            <td>{{ $achievement->user_id }}</td>
                                            <td>{{ \App\User::where('id', $achievement->user_id)->pluck('name') }}</td>

                                            @if( $authUser->id == $achievement->user_id )
                                                <td><a href="{{ route('achievement.edit', $achievement->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>
                                                <td><a href="{{ route('achievement.delete', $achievement->id) }}"><button class="btn btn-danger" type="button">Delete </button></a></td>
                                            @else
                                                <td>Edit</td>
                                                <td>Delete</td>
                                            @endif

                                        </tr>
                                    @endforeach
                                @else
                                    No data found
                                @endif
                                </tbody>
                            </table>
                            <br>

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
