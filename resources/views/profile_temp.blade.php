@extends('layouts.master')

@section('content')



    <section class="basic-content">
        <div class="cover-photo" style="background: url('uploads/images/users/1487674760_users.jpg');">

        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="card basic-profile">
                        <img src="{!! asset($authUser->image) !!}" alt="profile-photo" class="img-responsive img-circle center-block" style="width: 124px; height: 124px;">
                        <h2>{{$authUser->name}}</h2>
                        <p><strong>Email:</strong> <u>{{$authUser->email}}</u> </p>
                        <p><strong>Mobile No:</strong> {{$authUser->contact}}</p>
                        <p><strong>Address:</strong> {{$authUser->adress}}</p>
                        <p><strong>CV:</strong> <a href="{!! $authUser->CV !!}">Download CV</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Showing Different Skills --}}
    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card achievements">
                    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                                    <strong> Professional SKills</strong>
                                </a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">
                                    <strong> Volunteering Skills</strong>
                                </a>
                            </li>
                            {{--<li role="presentation" class="dropdown">
                                <a href="#" class="dropdown-toggle" id="myTabDrop1" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                                    <li class=""><a href="#dropdown1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1" aria-expanded="false">@fat</a></li>
                                    <li><a href="#dropdown2" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2" aria-expanded="false">@mdo</a></li>
                                </ul>
                            </li>--}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">

                                <p>
                                    @foreach($authUser->skills as $skill )
                                        <span class="badge badge-success">{{$skill->name}}</span>
                                    @endforeach
                                </p>

                                {{--<div class="pskill-add-button">
                                    <div class="button-group">
                                        <p>
                                            <a href="{!! route('achievement.create') !!}" class="btn btn-info btn-lg">
                                                <span class="glyphicon glyphicon-plus"></span> Add new Professional skill
                                            </a>
                                        </p>
                                    </div>
                                </div>--}}

                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab">
                                <p>
                                    @foreach($authUser->volunteeringskill as $volunteskill )
                                        <span class="badge badge-success">{{$volunteskill->name}}</span>
                                    @endforeach
                                </p>
                                {{--<div class="vskill-add-button">
                                    <div class="button-group">
                                        <p>
                                            <a href="{!! route('achievement.create') !!}" class="btn btn-info btn-lg">
                                                <span class="glyphicon glyphicon-plus"></span> Add new Volunteering skill
                                            </a>
                                        </p>
                                    </div>
                                </div>--}}
                            </div>

                            {{--<div class="tab-pane fade" role="tabpanel" id="dropdown1" aria-labelledby="dropdown1-tab">
                                <p>
                                    First Drop Down
                                </p>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="dropdown2" aria-labelledby="dropdown2-tab">
                                <p>
                                    Second Drop
                                </p>
                            </div>--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    {{-- SHowing different achievements, projects, papers --}}

    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card achievements">

                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Achievement
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <div class="achievement-title">
                                        <h4>Achievements: </h4>
                                        <div class="button-group">
                                            <p>
                                                <a href="{!! route('achievement.create') !!}" class="btn btn-info btn-lg">
                                                    <span class="glyphicon glyphicon-plus"></span> Add new achievement
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                    @if(count($achievements))
                                        @foreach($achievements as $achievement)
                                            <div class="single-achievement">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>{{ $achievement->title }} </h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="button-group">
                                                            <a href="{{ route('achievement.edit', $achievement->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                                            <a href="{{ route('achievement.delete', $achievement->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p>{{ $achievement->issuer }}</p>
                                                <p>{{ $achievement->year }}</p>
                                                <p>{{ $achievement->details }}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        No data found
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Projects
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">

                                    <div class="achievement-title">
                                        <h4>Projects: </h4>
                                        <div class="button-group">
                                            <p>
                                                <a href="{!! route('project.create') !!}" class="btn btn-info btn-lg">
                                                    <span class="glyphicon glyphicon-plus"></span> Add new Project
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                    @if(count($projects))
                                        @foreach($projects as $project)
                                            <div class="single-achievement">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>{!! $project->name !!}</h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="button-group">
                                                            <a href="{{ route('project.edit', $project->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                                            <a href="{{ route('project.delete', $project->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <p><a href="{!! $project->link !!}">{{ $project->link }}</a> </p>
                                                <p>{{ $project->details }}</p>

                                            </div>
                                        @endforeach
                                    @else
                                        No data found
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Publications:
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">

                                    <div class="achievement-title">
                                        <h4>Publications: </h4>
                                        <div class="button-group">
                                            <p>
                                                <a href="{!! route('paper.create') !!}" class="btn btn-info btn-lg">
                                                    <span class="glyphicon glyphicon-plus"></span> Add new Paper
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                    @if(count($papers))
                                        @foreach($papers as $paper)
                                            <div class="single-achievement">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3>{!! $paper->name !!}</h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="button-group">
                                                            <a href="{{ route('paper.edit', $paper->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                                            <a href="{{ route('paper.delete', $paper->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p><a href="{!! $paper->link !!}">{{ $paper->link }}</a> </p>
                                                <p>{{ $paper->details }}</p>

                                            </div>
                                        @endforeach
                                    @else
                                        No data found
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection



{{--SKills
            1.Proffessional Skills:

                @foreach($authUser->skills as $skill )
                    {{$skill->name}}
                @endforeach


            2. Volunteering Skills:

                @foreach($authUser->volunteeringskill as $volunteskill )
                    {{$volunteskill->name}}
                @endforeach
    --}}


{{--<div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
    <ul class="nav nav-tabs" id="myTabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Home</a></li>
        <li role="presentation" class=""><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Profile</a></li>
        <li role="presentation" class="dropdown">
            <a href="#" class="dropdown-toggle" id="myTabDrop1" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                <li class=""><a href="#dropdown1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1" aria-expanded="false">@fat</a></li>
                <li><a href="#dropdown2" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2" aria-expanded="false">@mdo</a></li>
            </ul>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active in" role="tabpanel" id="home" aria-labelledby="home-tab">
            <p>
                HomeTab
            </p>
        </div>
        <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab">
            <p>
                Profile Tab
            </p>
        </div>
        <div class="tab-pane fade" role="tabpanel" id="dropdown1" aria-labelledby="dropdown1-tab">
            <p>
                First Drop Down
            </p>
        </div>
        <div class="tab-pane fade" role="tabpanel" id="dropdown2" aria-labelledby="dropdown2-tab">
            <p>
                Second Drop
            </p>
        </div>
    </div>
</div>--}}
{{--Achievements Cards--}}
{{--
    Add new Achievements not added yet
    <a href="{{ route('achievement.create') }}">ADD YOUR ACHIEVEMENTS </a>
--}}
{{--
<section class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card achievements">
                <div class="achievement-title">
                    <h4>Achievements: </h4>
                    <div class="button-group">
                        <p>
                            <a href="{!! route('achievement.create') !!}" class="btn btn-info btn-lg">
                                <span class="glyphicon glyphicon-plus"></span> Add new achievement
                            </a>
                        </p>
                    </div>
                </div>

                @if(count($achievements))
                    @foreach($achievements as $achievement)
                        <div class="single-achievement">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>{{ $achievement->title }} </h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="button-group">
                                        <a href="{{ route('achievement.edit', $achievement->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                        <a href="{{ route('achievement.delete', $achievement->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                    </div>
                                </div>
                            </div>

                            <p>{{ $achievement->issuer }}</p>
                            <p>{{ $achievement->year }}</p>
                            <p>{{ $achievement->details }}</p>
                        </div>
                    @endforeach
                @else
                    No data found
                @endif
            </div>
        </div>
    </div>

</section>

--}}
{{--Projects Cards--}}{{--

--}}
{{--
    Add new Projects not added yet
    <a href="{{ route('project.create') }}">Add your projects </a>
 --}}{{--

<section class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card achievements">
                <div class="achievement-title">
                    <h4>Projects: </h4>
                    <div class="button-group">
                        <p>
                            <a href="{!! route('project.create') !!}" class="btn btn-info btn-lg">
                                <span class="glyphicon glyphicon-plus"></span> Add new Project
                            </a>
                        </p>
                    </div>
                </div>

                @if(count($projects))
                    @foreach($projects as $project)
                        <div class="single-achievement">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>{!! $project->name !!}</h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="button-group">
                                        <a href="{{ route('project.edit', $project->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                        <a href="{{ route('project.delete', $project->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                    </div>
                                </div>

                            </div>

                            <p><a href="{!! $project->link !!}">{{ $project->link }}</a> </p>
                            <p>{{ $project->details }}</p>

                        </div>
                    @endforeach
                @else
                    No data found
                @endif
            </div>
        </div>
    </div>
</section>

--}}
{{--Papers Cards--}}{{--

--}}
{{--
    Add new Papers not added yet
    <a href="{{ route('paper.create') }}">Add your papers </a>
 --}}{{--

<section class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card achievements">
                <div class="achievement-title">
                    <h4>Publications: </h4>
                    <div class="button-group">
                        <p>
                            <a href="{!! route('paper.create') !!}" class="btn btn-info btn-lg">
                                <span class="glyphicon glyphicon-plus"></span> Add new Paper
                            </a>
                        </p>
                    </div>
                </div>
                @if(count($papers))
                    @foreach($papers as $paper)
                        <div class="single-achievement">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>{!! $paper->name !!}</h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="button-group">
                                        <a href="{{ route('paper.edit', $paper->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                        <a href="{{ route('paper.delete', $paper->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                    </div>
                                </div>
                            </div>

                            <p><a href="{!! $paper->link !!}">{{ $paper->link }}</a> </p>
                            <p>{{ $paper->details }}</p>

                        </div>
                    @endforeach
                @else
                    No data found
                @endif
            </div>
        </div>
    </div>
</section>--}}
