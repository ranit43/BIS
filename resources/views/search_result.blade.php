@extends('layouts.master')

@section('content')

    <section class="search-result">
        <div class="container">
            <h4>Showing the Search Results with the selected skills:</h4>
            <hr>
            <div class="row">
                @foreach($users as $user)
                    <div class="col-md-4">
                        <div class="thumbnail text-center">
                            <img class="img-circle" src="{{ asset( $user->image ) }}" style="width: 200px" alt="{{ $user->name  }}" >
                            <div class="caption">
                                <h3>{{ $user->name  }}</h3>
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

                                <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection