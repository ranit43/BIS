@extends('layouts.app')

@section('content')

		{{--<div class="flex-center position-ref full-height">
		        @if (Route::has('login'))
		                <div class="top-right links">
		                    <a href="{{ url('/search') }}">TalentSearch</a>
		                    <a href="{{ url('/forum') }}">Forum</a>
		                    
		                    @if (Auth::check())
		                       <!-- <a href="{{ url('/edit') }}">Edit</a>  -->
		                        <a href="{{ url('/home') }}">Profile</a>    
		                    @else
		                        <a href="{{ url('/login') }}">Login</a>
		                        <a href="{{ url('/register') }}">Register</a>
		                        
		                    @endif
		                </div>
		         @endif
		</div>--}}

		<div class="row">
			<div class="col-md-6 col-md-offset-3"> 

				{!! Form::model($authUser,['route' => ['profileUpdate', $authUser->id], 'method' => 'post', 'files' => true]) !!}
					
					<div class="form-group">
						{{ Form::label('name', 'Username') }}
						{{ Form::text('name', null, ['id' => 'name', 'placeholder' => 'Update your User name', 'class' => 'form-control']) }}
					</div>

					<!-- <div class="form-group">
						{{ Form::label('user_name', 'Username') }}
						{{ Form::text('user_name', null, ['id' => 'name', 'placeholder' => 'Update your User name', 'class' => 'form-control']) }}
					</div> -->

					<div class="form-group">
						{{ Form::label('email', 'Your Email') }}
						{{ Form::email('email', null, ['id' => 'email', 'placeholder' => 'Update Your email', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('contact', 'Contact') }}
						{{ Form::text('contact', null, ['id' => 'contact', 'placeholder' => 'Update your Contact', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						{{ Form::label('adress', 'Address') }}
						{{ Form::text('adress', null, ['id' => 'adress', 'placeholder' => 'Update your Adress', 'class' => 'form-control']) }}
					</div>
<!-- 
					<div class="form-group">
						{{ Form::label('achievement', 'Achievement') }}
						{{ Form::text('name', null, ['id' => 'achievement', 'placeholder' => 'Update your Achievement', 'class' => 'form-control']) }}
					</div> -->

					<div class="form-group">

						{{ Form::label('cv', "CV*", array('class' => 'control')) }}
						{{ Form::file('cv', array('class'=>'form-control', 'multiple'=>false )) }}
					</div>

					<div class="form-group">

						{{ Form::label('image', "Image*", array('class' => 'control')) }}
						{{ Form::file('image', array('class'=>'form-control', 'multiple'=>false )) }}
					</div>


					<!-- Add condtions so that already added skills be checked automatically -->
					@if(count($skills))
				    	@foreach($skills as $skill)
					    	<div class="form-group">
								{!! Form::checkbox('skill[]', $skill->id, in_array($skill->id, $mySkills) ? true : false
									)
								!!}
								{{ Form::label('skill', $skill->name) }}
							</div>
				      	@endforeach
			    	@else
			    		No data found
			    	@endif



					

					<div class="form-group">
		            	{{ Form::submit('Update', ['class' => 'btn btn-success']) }}
					</div>

					{!! Form::close() !!}
			</div>
		</div>

		

@endsection