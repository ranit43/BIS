@extends('layouts.app')

@section('content')
<!-- <body> 
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <a href="{{ url('/edit') }}">Edit</a>
        </div>
    </div>
</body> -->

<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>


                <div class="panel-body">
                   @foreach($authUser->skills as $skill )
                   {{$skill->name}}
                   @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
