@extends('layouts.master')

@section('content')

    <section class="search-home">

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {{--<div class="panel-heading">post</div>--}}
                    Achievement add page.
                    <br/>
                    <br/>

                    {{--{!! ! Form::open([ 'id' => 'post-question-form']) !!}--}}
                    {!!  Form::open([ 'route' => 'achievement.store', 'method' => 'post']) !!}

                    {!! Form::label('ttile', 'Title (Position in the Competition)' ) !!}
                    {!! Form::text('title', null, ['id' => 'title', 'class' =>'form-control', 'placeholder' => 'Title', 'required' ]) !!}

                    <br>

                    {!! Form::label('issuer', 'Issuer (Competition Name)') !!}
                    {!! Form::text('issuer', null, ['id' => 'issuer', 'class' =>'form-control', 'placeholder' => 'Issuer', 'required' ]) !!}

                    <br>
                    {!! Form::label('year', 'Year') !!}
                    {!! Form::text('year', null, ['id' => 'year', 'class' =>'form-control', 'placeholder' => 'Year', 'required' ]) !!}

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