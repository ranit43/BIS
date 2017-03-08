@extends('layouts.master')

@section('content')

    <div class="well">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                {!! Form::model($comment, ['route' => ['comment.update', $comment->id], 'method' => 'PUT', 'files' => true]  ) !!}

                <br/>

                {{--<div class="form-group">
                    {!! Form::label('text', 'Comment') !!}
                    {{ Form::text('text', null, ['id' => 'text', 'placeholder' => 'Enter your details', 'class' => 'form-control']) }}
                </div>--}}

                <div class="form-group">
                    {!! Form::label('text', 'Comment') !!}
                    <br>
                    {!! Form::textarea( 'text', null, ['size' => '85x4'], [ 'id' => 'body', 'class' => 'form-control', 'placeholder' => 'Edit your Comment', 'required' ]) !!}
                </div>

                <br>

                <div class="form-group">
                    {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                </div>
                {!! Form::close() !!}

            </div>
        </div>


    </div>
@endsection
