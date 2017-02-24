@extends('layouts.master')

@section('content')

    <section class="search-home">

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    {!! Form::model($paper, ['route' => ['paper.update', $paper->id], 'method' => 'PUT', 'files' => true]  ) !!}

                    {!! Form::label('name', 'Title (Position in the Competition)' ) !!}
                    {!! Form::text('name', null, ['id' => 'name', 'class' =>'form-control', 'placeholder' => 'Title']) !!}

                    <br>

                    {!! Form::label('link', 'Link:') !!}
                    {!! Form::text('link', null, ['id' => 'link', 'class' =>'form-control', 'placeholder' => 'Link' ]) !!}

                    <br>

                    {!! Form::label('details', 'Details') !!}
                    {!! Form::textarea( 'details', null, [ 'id' => 'details', 'class' => 'form-control', 'placeholder' => 'Details' ]) !!}

                    <br>
                    <br>
                    {!!   Form::submit('Submit', ['class' => 'btn btn-success']) !!}

                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </section>
@endsection
