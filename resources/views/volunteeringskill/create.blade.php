<!DOCTYPE html>
<html>
<head>
    <title>  </title>
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
</head>
<body>
<h1> Volunteering Skill Create Page.</h1>

<div class="well">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::open(['route' => 'volunteeringskill.store', 'method' => 'post', 'files' => true]) !!}

            <div class="form-group">
                {{ Form::label('name', 'Volunteering Skill Name') }}
                {{ Form::text('name', null, ['id' => 'name', 'placeholder' => 'Enter a new Volunteering skill', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Add', ['class' => 'btn btn-success']) }}
            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>

</body>
</html>
