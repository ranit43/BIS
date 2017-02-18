@extends('layouts.app')

@section('content')
    <div class="well">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                {!! Form::model($comment, ['route' => ['comment.update', $comment->id], 'method' => 'PUT', 'files' => true]  ) !!}

                <br/>

                <div class="form-group">
                    {!! Form::label('text', 'Comment') !!}
                    {{ Form::text('text', null, ['id' => 'text', 'placeholder' => 'Enter your details', 'class' => 'form-control']) }}
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
