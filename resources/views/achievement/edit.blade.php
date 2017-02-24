@extends('layouts.master')

@section('content')

    <section class="search-home">

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    {!! Form::model($achievement, ['route' => ['achievement.update', $achievement->id], 'method' => 'PUT', 'files' => true]  ) !!}

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

                </div>
            </div>
        </div>
    </section>

        {!! Form::close() !!}
    </div>
@endsection
