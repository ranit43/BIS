@extends('layouts.master')

@section('content')

    <section class="search-home">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {{--<div class="panel-heading">post</div>--}}
                    Project add page.
                    <br/>
                    <br/>

                    {{--{!! ! Form::open([ 'id' => 'post-question-form']) !!}--}}
                    {!!  Form::open([ 'route' => 'project.store', 'method' => 'post']) !!}

                    {!! Form::label('name', 'Title (Position in the Competition)' ) !!}
                    {!! Form::text('name', null, ['id' => 'name', 'class' =>'form-control', 'placeholder' => 'Title']) !!}

                    <br>

                    {!! Form::label('link', 'Link:') !!}
                    {!! Form::text('link', null, ['id' => 'link', 'class' =>'form-control', 'placeholder' => 'Link' ]) !!}

                    {{--{{ Form::url('webpage', 'http://a.com', ['class' => 'field']) }}--}}
                    <br>

                    {!! Form::label('details', 'Details') !!}
                    {!! Form::textarea( 'details', null, [ 'id' => 'details', 'class' => 'form-control', 'placeholder' => 'Details' ]) !!}

                    <br>
                    {!!   Form::submit('Submit', ['class' => 'btn btn-success']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>

@endsection