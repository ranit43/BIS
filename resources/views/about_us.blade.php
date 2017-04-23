@extends('layouts.master')

@section('content')



    <section class="search-result">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">

                    <div class="col-md-offset-4 col-md-4">
                        <div class="thumbnail text-center">

                            <img class="img-circle img-responsive" src="{{ asset( $user->image ) }}" style="width: 200px; height: 200px" alt="{{ $user->name  }}" >
                            <div class="caption">
                                <h3><a href="{{ route('show_user_profile', $user->id) }}">MD. Masum</a> </h3>
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
                                <p>
                                    Professional Skill:
                                    <br>
                                    @foreach($user->skills as $skill )
                                        <span class="badge badge-success sr">{{$skill->name}}</span>
                                    @endforeach
                                </p>

                                {{--<p>
                                    <a href="#" class="btn btn-primary" role="button">Button</a>
                                    <a href="#" class="btn btn-default" role="button">Button</a>
                                </p>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>

@endsection