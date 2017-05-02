@extends('layouts.master')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content')

    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="cardtop card edit">
                    <div class="single edit-field">


                        <h5>Write your Post!</h5>
                        <br/>

                        {!!  Form::open([ 'route' => 'post.store', 'method' => 'post']) !!}

                        <div class="form-group">
                            {!! Form::label('ttile', 'Title') !!}
                            {!! Form::text('title', null, ['id' => 'title', 'class' =>'form-control', 'placeholder' => 'Title of your post!', 'required' ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('category', 'Category') !!}
                            <select name="category" class="form-control">
                                <option>Class</option>
                                <option>Exams</option>
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', 'Body') !!}
                            {!! Form::textarea( 'body', null, [ 'id' => 'body', 'class' => 'form-control', 'placeholder' => 'Tell us about your question', 'required' ]) !!}
                        </div>


                        <div class="form-group">
                            {!!   Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                        </div>

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </section>



    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.skill-multiple').select2();
    </script>

@endsection

