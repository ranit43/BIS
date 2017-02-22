@extends('layouts.master')

@section('content')

    <div class="well">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
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


                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset( $user->image ) }}" alt="Mountain View" style="width:200px;height:200px;">
                            </div>

                        </div>
                        <hr>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection