@extends('layouts.master')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content')

    <section class="aboutus">


        <div class="row">
            <div class="col">
                <div class="username">


                    <h5>User List</h5>
                    <h5>
                        @if(session('success'))
                            {{ session('success') }}
                        @elseif(session('error'))
                            {{ session('error') }}
                        @endif
                    </h5>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">



                    @foreach($users as $user)
                        <div class="col-md-3">
                            <div class="thumbnail text-center">

                                <img class="img-circle img-responsive" src="{{ asset( $user->image ) }}" style="width: 150px; height: 150px" alt="{{ $user->name  }}" >
                                <div class="caption">
                                    <h4><a href="{{ route('show_user_profile', $user->id) }}">{{ $user->name  }}</a> </h4>
                                    {{--<h3>{{ $user->name  }}</a> </h3>--}}
                                    {{--
                                        <li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>

                                    <a href="{{ route('paper.edit', $paper->id) }}">--}}
                                    {{--<button class="btn btn-primary" type="button">--}}
                                    {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                    {{--</button>--}}
                                    {{--</a>--}}
                                    {{--<p>...</p>--}}
                                    <p>Email: {!! $user->email !!}</p>
                                    <p>Contact: {!! $user->contact !!}</p>
                                    CV: <a href="{!! $user->CV !!}">Download CV </a>
                                    {{--<p>--}}
                                        {{--Professional Skill:--}}
                                        {{--<br>--}}
                                        {{--@foreach($user->skills as $skill )--}}
                                            {{--<span class="badge badge-success sr">{{$skill->name}}</span>--}}
                                        {{--@endforeach--}}
                                    {{--</p>--}}


                                    <p>Role: {{$user->role}}</p>
                                    <br>
                                    @if($authUser->role == "Admin")
                                        <a href="{{ route('user.user_edit', $user->id) }}">
                                            <button class="btn btn-primary" type="button">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                        </a>
                                        {{--<a href="{{ route('user.delete', $user->id) }}">--}}
                                        {{--<button class="btn btn-danger" type="button">--}}
                                        {{--<span class="glyphicon glyphicon-remove"></span>--}}
                                        {{--</button>--}}
                                        {{--</a>--}}

                                        <a class="btn btn-danger" data-toggle="confirmation" data-title="Delete User?" data-placement="bottom"
                                           href="{{ route('user.delete', $user->id) }}" >

                                            <span class="glyphicon glyphicon-remove"></span>

                                        </a>
                                    @endif


                                    {{--<p>
                                        <a href="#" class="btn btn-primary" role="button">Button</a>
                                        <a href="#" class="btn btn-default" role="button">Button</a>
                                    </p>--}}
                                    {{--<br>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="username">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </section>

@endsection


@section('scripts')

    <!-- for Datatable -->

    {{--<script src="{{ asset('js/jquery.js') }}"></script>--}}
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap-confirmation.min.js') }}"></script>
    <script>

        $( document ).ready( function() {
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
// other options
            });
        });
    </script>


@stop

{{--

<div class="well">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @if(session('success'))
                    {{ session('success') }}

                @elseif(session('error'))
                    {{ session('error') }}

                @endif

                Showing all Users:
                <hr>

                @foreach($users as $user)
                    <div class="showUser">
                    <!-- {!! $user->image !!} -->

                        <div class="row">
                            <div class="col-md-6">
                                <br>
                                Name:  {!! $user->name !!}
                                <br>
                                Email: {!! $user->email !!}
                                <br>
                                Contact: {!! $user->contact !!}
                                <br>
                                CV: <a href="{!! $user->CV !!}">Download CV </a>
                                <br>
                                Prfessional Skill:
                                @foreach($user->skills as $skill )
                                    {{$skill->name}}
                                @endforeach
                                <br>
                                Role: {{$user->role}}
                                <br>
                                <a href="{{ route('user.user_edit', $user->id) }}">
                                    <button class="btn btn-primary" type="button">
                                        EDit
                                    </button>
                                </a>


                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset( $user->image ) }}" alt="Mountain View" style="width:200px;height:200px;">
                            </div>

                        </div>
                        <hr>
                    </div>
                @endforeach
                {{ $users->links() }}
            </div>
        </div>
    </div>

--}}