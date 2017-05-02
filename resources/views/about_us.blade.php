@extends('layouts.master')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@section('content')

    <section class="aboutus">

        <div class="container">

            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="row">
                        <div class="col-md-offset-4 col-md-4 text-center">
                            <h5> Developed By:</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">

                            <div class="thumbnail text-center">

                                <img class="img-circle img-responsive" src="/uploads/images/users/MasumSir.jpg" style="width: 200px; height: 200px" alt="Md Masum" >
                                <div class="caption">
                                    <h5>Md Masum</h5>
                                    <p>Associate Professor</p>
                                    <p>Dept. of CSE, SUST</p>
                                    {{--<h3>{{ $user->name  }}</a> </h3>--}}
                                    {{--
                                        <li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>

                                    <a href="{{ route('paper.edit', $paper->id) }}">--}}
                                    {{--<button class="btn btn-primary" type="button">--}}
                                    {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                    {{--</button>--}}
                                    {{--</a>--}}

                                    <p>Email: masum-cse@sust.edu</p>
                                    <p>Contact: +88-01919736248</p>
                                    {{--<p>{{ $destination }}MasumSir.jpg</p>--}}
                                    {{--CV: <a href="{!! $user->CV !!}">Download CV </a>--}}

                                    {{--<p>
                                        <a href="#" class="btn btn-primary" role="button">Button</a>
                                        <a href="#" class="btn btn-default" role="button">Button</a>
                                    </p>--}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="thumbnail text-center">

                                <img class="img-circle img-responsive" src="/uploads/images/users/ranit.jpg" style="width: 200px; height: 200px" alt="Ranit" >
                                <div class="caption">
                                    <h5>Ranit Debnath Akash</h5>
                                    <p>Student</p>
                                    <p>Dept. of CSE, SUST</p>
                                    {{--<h3>{{ $user->name  }}</a> </h3>--}}
                                    {{--
                                        <li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>

                                    <a href="{{ route('paper.edit', $paper->id) }}">--}}
                                    {{--<button class="btn btn-primary" type="button">--}}
                                    {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                    {{--</button>--}}
                                    {{--</a>--}}

                                    <p>Email: ranitid12@gmail.com</p>
                                    <p>Contact: +88-01719424849</p>
                                    {{--<p>{{ $destination }}MasumSir.jpg</p>--}}
                                    {{--CV: <a href="{!! $user->CV !!}">Download CV </a>--}}

                                    {{--<p>
                                        <a href="#" class="btn btn-primary" role="button">Button</a>
                                        <a href="#" class="btn btn-default" role="button">Button</a>
                                    </p>--}}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="thumbnail text-center">

                                <img class="img-circle img-responsive" src="/uploads/images/users/tania.jpg" style="width: 200px; height: 200px" alt="tania" >
                                <div class="caption">
                                    <h5>Tanjila Mawla Tania</h5>
                                    <p>Student</p>
                                    <p>Dept. of CSE, SUST</p>
                                    {{--<h3>{{ $user->name  }}</a> </h3>--}}
                                    {{--
                                        <li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>

                                    <a href="{{ route('paper.edit', $paper->id) }}">--}}
                                    {{--<button class="btn btn-primary" type="button">--}}
                                    {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                    {{--</button>--}}
                                    {{--</a>--}}

                                    <p>Email: tani109.bd@gmail.com</p>
                                    <p>Contact: +88-01XXXXXXXXX</p>
                                    {{--<p>{{ $destination }}MasumSir.jpg</p>--}}
                                    {{--CV: <a href="{!! $user->CV !!}">Download CV </a>--}}

                                    {{--<p>
                                        <a href="#" class="btn btn-primary" role="button">Button</a>
                                        <a href="#" class="btn btn-default" role="button">Button</a>
                                    </p>--}}
                                </div>
                            </div>
                        </div>

                    </div>

                    {{--<div class="row">--}}
                    {{--<div class="col-md-offset-4 col-md-4 text-center">--}}
                    {{--<h5> Developed By:</h5>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                </div>
            </div>

        </div>
    </section>

@endsection