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

                        <h4>Paper add page.</h4>
                        <br/>

                        {!!  Form::open([ 'route' => 'paper.store', 'method' => 'post']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Paper Title:' ) !!}
                            {!! Form::text('name', null, ['id' => 'name', 'class' =>'form-control', 'placeholder' => 'Write title of your Paper']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('link', 'Paper Link: (e.g. https://z.com/x/y)') !!}
                            {!! Form::text('link', null, ['id' => 'link', 'class' =>'form-control', 'placeholder' => 'e.g. https://z.com/x/y' ]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('details', 'Paper details') !!}
                            {!! Form::textarea( 'details', null, [ 'id' => 'details', 'class' => 'form-control',
                                'placeholder' => 'Write Details abour your Paper' ]) !!}


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

