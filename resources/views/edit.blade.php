@extends('layouts.master')

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
		<div class ="edit" >
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

					<div class="form-group">
						{{ Form::label('skill', "Skill", array('class' => 'control')) }}
						<br>
						{{--SKill List:
						<br>--}}
						@if(count($skills))
							<select class="skill-multiple form-control" multiple="multiple" name="skill[]">

								@foreach($skills as $skill)

									{{--{!! Form::checkbox('skill[]', $skill->id, in_array($skill->id, $mySkills) ? true : false) !!}--}}
									<option value="{{ $skill->id }}" {{ in_array($skill->id, $mySkills) ? "selected" : ""   }} >
										{{ $skill->name  }}
									</option>

								@endforeach
							</select>
						@else
							No data found
						@endif
					</div>

					<div class="form-group">
						{{ Form::label('volunteering-skill', "Volunteering SKill List:", array('class' => 'control')) }}
						<br>
						@if(count($volunteeringSkills))
							<select class="skill-multiple form-control" multiple="multiple" name="volunteeringSkill[[]">

								@foreach($volunteeringSkills as $volunteeringSkill)

									{{--{!! Form::checkbox('skill[]', $skill->id, in_array($skill->id, $mySkills) ? true : false) !!}--}}
									<option value="{{  $volunteeringSkill->id }}" {{ in_array($volunteeringSkill->id, $myVolunteeringSkills ) ? "selected" : ""   }} >
										{{ $volunteeringSkill->name  }}
									</option>

								@endforeach
							</select>
						@else
							No data found
						@endif
					</div>

					{{--<div class="form-group">
						{{ Form::label('skill', "Volunteering SKill List:", array('class' => 'control')) }}
						<br>
						@if(count($volunteeringSkills))

							@foreach($volunteeringSkills as $volunteeringSkill)
								{!! Form::checkbox('volunteeringSkill[]', $volunteeringSkill->id, in_array($volunteeringSkill->id, $myVolunteeringSkills ) ? true : false) !!}
								{{ Form::label('volunteeringSkill', $volunteeringSkill->name) }}
							@endforeach
						@else
							No data found
						@endif
					</div>--}}

					<div class="form-group">
						{{ Form::submit('Update', ['class' => 'btn btn-success']) }}
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>



		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
		<script type="text/javascript">
            $('.skill-multiple').select2();
		</script>

@endsection

