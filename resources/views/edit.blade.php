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
						{{ Form::email('email', null, ['id' => 'email', 'placeholder' => 'Update Your email', 'class' => 'form-control']) }}
					</div>

					<!-- <div class="form-group">
						{{ Form::label('contact', 'Contact') }}
						{{ Form::text('name', null, ['id' => 'contact', 'placeholder' => 'Update your Contact', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('address', 'Address') }}
						{{ Form::text('name', null, ['id' => 'adress', 'placeholder' => 'Update your Adress', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('achievement', 'Achievement') }}
						{{ Form::text('name', null, ['id' => 'achievement', 'placeholder' => 'Update your Achievement', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('cv', 'CV') }}
						{{ Form::text('name', null, ['id' => 'cv', 'placeholder' => 'Upload your CV', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('picture', 'Picture') }}
						{{ Form::text('name', null, ['id' => 'picture', 'placeholder' => 'Update your Achievement', 'class' => 'form-control']) }}
					</div> -->


					<!-- Add condtions so that already added skills be checked automatically -->
					@if(count($skills))
				    	@foreach($skills as $skill)
					    	<div class="form-group">
								
								{{ Form::checkbox('skill[]', $skill->id) }}
								{{ Form::label('skill', $skill->name) }}
							</div>
				      <!-- <tr>
				        <td>{{ $skill->id }}</td>
				        <td>{{ $skill->name }}</td>
				        
				      </tr> -->
				      	@endforeach
			    	@else
			    		No data found
			    	@endif
					


					

					<div class="form-group">
		            	{{ Form::submit('Update', ['class' => 'btn btn-success']) }}
					</div>
			</div>
		</div>

		{!! Form::close() !!}
	</div>

</body>
</html>
