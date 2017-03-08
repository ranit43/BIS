@extends('layouts.master')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content')

    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card edit">
                    <div class="single edit-field">


                        <h4>Edit Your Post.</h4>
                        <br/>

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

