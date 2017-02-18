@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {{--<div class="panel-heading">Forum</div>--}}
                Forum page.
                <br/>
                <br/>

                {{--{!! ! Form::open([ 'id' => 'post-question-form']) !!}--}}
                {!!  Form::open([ 'route' => 'forum.store', 'method' => 'post']) !!}

                {!! Form::label('ttile', 'Title') !!}
                {!! Form::text('title', null, ['id' => 'title', 'class' =>'form-control', 'placeholder' => 'Title', 'required' ]) !!}
                <br/>
                {!! Form::label('category', 'Category') !!}
                <select name="category" class="form-control">
                    <option>Class</option>
                    <option>Exams</option>
                </select>
                <br/>
                {!! Form::label('body', 'Body') !!}
                {!! Form::textarea( 'body', null, [ 'id' => 'body', 'class' => 'form-control', 'placeholder' => 'Tell us about your question', 'required' ]) !!}
                <br/>
                {!!   Form::submit('Submit', ['class' => 'btn btn-success']) !!}

                {!! Form::close() !!}


            </div>
        </div>
    </div>

@endsection