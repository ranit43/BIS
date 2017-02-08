<!DOCTYPE html>
<html>
<head>
	<title>  </title>
	{!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
</head>
<body>
	<h1> Profile Edit Page.</h1>

	<div class="well">
		<div class="row">
			<div class="col-md-6 col-md-offset-3"> 

				{!! Form::model($authUser,['route' => ['profileUpdate', $authUser->id], 'method' => 'post', 'files' => true]) !!}
					
					<div class="form-group">
						{{ Form::label('name', 'Username') }}
						{{ Form::text('name', null, ['id' => 'name', 'placeholder' => 'Update your User name', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('email', 'Your Email') }}
						{{ Form::number('price', null, ['id' => 'price', 'placeholder' => 'Update Your email', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
		            	{{ Form::submit('Update', ['class' => 'btn btn-success']) }}
					</div>
			</div>
		</div>

		{!! Form::close() !!}
	</div>

</body>
</html>
