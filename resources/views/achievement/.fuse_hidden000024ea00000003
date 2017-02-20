@extends('layouts.app')

@section('content')
    <div class="well">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PUT', 'files' => true]  ) !!}

                <div class="form-group">
                    {{ Form::label('title', 'post title') }}
                    {{ Form::text('title', null, ['id' => 'title', 'placeholder' => 'Enter your post', 'class' => 'form-control']) }}
                </div>

                {!! Form::label('category', 'Category') !!}
                <select name="category" class="form-control">
                    <option>Class</option>
                    <option>Exams</option>
                </select>
                <br/>

                <div class="form-group">
                    {!! Form::label('details', 'post details') !!}
                    {{ Form::text('details', null, ['id' => 'details', 'placeholder' => 'Enter your details', 'class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
