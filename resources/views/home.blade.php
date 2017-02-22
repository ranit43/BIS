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

                            @if(count($achievements))

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

                            @endif
                            <br>

                            {{--Project Showing--}}
                            Projects:
                            <br>
                            <br>
                            <a href="{{ route('project.create') }}">Add your projects </a>
                            <br>
                            @if(count($projects))
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ProjectID</th>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Details</th>
                                        <th>UserID</th>
                                        <th>User</th>
                                        <th>#</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($projects))
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>{{ $project->id }}</td>
                                                {{--<td><a href="{{ route('project.show_project', $project->id) }}">{{ $project->title }}</a> </td>--}}
                                                <td>{{ $project->name }} </td>
                                                {{--<td><a href="{{ route('project.show_project', $project->id) }}">{{ $project->link }}</a> </td>--}}
                                                <td><a href="{!! $project->link !!}">{{ $project->link }}</a> </td>
                                                {{--<td>{{ $project->link }}</td>--}}
                                                <td>{{ $project->details }}</td>
                                                <td>{{ $project->user_id }}</td>
                                                <td>{{ \App\User::where('id', $project->user_id)->pluck('name') }}</td>

                                                @if( $authUser->id == $project->user_id )
                                                    <td><a href="{{ route('project.edit', $project->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>
                                                    <td><a href="{{ route('project.delete', $project->id) }}"><button class="btn btn-danger" type="button">Delete </button></a></td>
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
                            @endif

                            Papers:
                            <br>
                            <a href="{{ route('paper.create') }}">Add your papers </a>
                            <br>
                            @if(count($papers))

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>paperID</th>
                                        <th>Name</th>
                                        <th>Details</th>
                                        <th>UserID</th>
                                        <th>User</th>
                                        <th>#</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($papers))
                                        @foreach($papers as $paper)
                                            <tr>
                                                <td>{{ $paper->id }}</td>
                                                {{--<td><a href="{{ route('paper.show_paper', $paper->id) }}">{{ $paper->title }}</a> </td>--}}
                                                {{--<td>{{ $paper->name }} </td>--}}
                                                {{--<td><a href="{{ route('paper.show_paper', $paper->id) }}">{{ $paper->link }}</a> </td>--}}
                                                <td><a href="{!! $paper->link !!}" target="_blank">{{ $paper->name }}</a> </td>
                                                {{--<td>{{ $paper->link }}</td>--}}
                                                <td>{{ $paper->details }}</td>
                                                <td>{{ $paper->user_id }}</td>
                                                <td>{{ \App\User::where('id', $paper->user_id)->pluck('name') }}</td>

                                                @if( $authUser->id == $paper->user_id )
                                                    <td><a href="{{ route('paper.edit', $paper->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>
                                                    <td><a href="{{ route('paper.delete', $paper->id) }}"><button class="btn btn-danger" type="button">Delete </button></a></td>
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

                            @endif

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
