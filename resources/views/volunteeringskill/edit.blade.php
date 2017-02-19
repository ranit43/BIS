<!DOCTYPE html>
<html>
<head>
    <title>  </title>
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
</head>
<body>
<h1> Volunteering Skills Edit Page.</h1>

<div class="well">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            {!! Form::model($volunteeringskill, ['route' => ['volunteeringskill.update', $volunteeringskill->id], 'method' => 'PUT', 'files' => true]  ) !!}

            <div class="form-group">
                {{ Form::label('name', 'volunteeringskill Name') }}
                {{ Form::text('name', null, ['id' => 'name', 'placeholder' => 'Enter your volunteeringskill', 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Add', ['class' => 'btn btn-success']) }}
            </div>

            {!! Form::close() !!}

        </div>
    </div>


</div>

</body>
</html>
