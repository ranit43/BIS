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

                        <div class="postpage">

                            <h5> Edit User Information</h5>

                            @if(session('success'))
                                {{ session('success') }}

                            @elseif(session('error'))
                                {{ session('error') }}

                            @endif

                        </div>



                        {!! Form::model($user,['route' => ['user.user_update', $user->id], 'method' => 'post', 'files' => true]) !!}

                        {{ Form::hidden('redirect_url', $redirect_url) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, ['id' => 'name', 'placeholder' => 'Update your User name', 'class' => 'form-control']) }}
                        </div>

                        <div class="form-group">

                            <div class="col-md-6 email-field">
                                {{ Form::label('email', 'Your Email') }}
                                {{ Form::email('email', null, ['id' => 'email', 'placeholder' => 'Update Your email', 'class' => 'form-control']) }}
                            </div>
                            <div class="col-md-6 contact-field">
                                {{ Form::label('contact', 'Contact') }}
                                {{ Form::text('contact', null, ['id' => 'contact', 'placeholder' => 'Update your Contact', 'class' => 'form-control']) }}
                                <br> </div>
                        </div>

                        {{--  <div class="form-group">

                              {{ Form::label('email', 'Your Email') }}
                              {{ Form::email('email', null, ['id' => 'email', 'placeholder' => 'Update Your email', 'class' => 'form-control']) }}
                          </div>

                          <div class="form-group">

                              {{ Form::label('contact', 'Contact') }}
                              {{ Form::text('contact', null, ['id' => 'contact', 'placeholder' => 'Update your Contact', 'class' => 'form-control']) }}
                          </div>--}}

                        <div class="form-group adres-edit">
                            {{ Form::label('adress', 'Address') }}
                            {{--{{ Form::text('adress', null, ['id' => 'adress', 'placeholder' => 'Update your Adress', 'class' => 'form-control']) }}--}}
                            {!! Form::textarea( 'adress', null, ['size' => '81x3'], ['id' => 'adress', 'placeholder' => 'Update your Adress', 'class' => 'form-control'] ) !!}
                            {{-- {{ Form::textarea('adress', null, ['id' => 'adress', 'placeholder' => 'Update your Adress', 'class' => 'form-control']) }}--}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('role', 'Role') !!}
                            <select name="role" class="form-control">
                                <option @if($user->role == 'student') selected @endif>Student</option>
                                <option @if($user->role == 'Teacher') selected @endif>Teacher</option>
                            </select>
                        </div>

                        {{--<div class="form-group">

                            {{ Form::label('cv', "CV*", array('class' => 'control')) }}
                            {{ Form::file('cv', array('class'=>'form-control', 'multiple'=>false )) }}
                        </div>

                        <div class="form-group">

                            {{ Form::label('image', "Image*", array('class' => 'control')) }}
                            {{ Form::file('image', array('class'=>'form-control', 'multiple'=>false )) }}
                        </div>--}}

                        <div class="form-group">

                            <div class="col-md-6 email-field">
                                {{ Form::label('cv', "CV*", array('class' => 'control')) }}
                                {{ Form::file('cv', array('class'=>'form-control', 'multiple'=>false )) }}
                            </div>
                            <div class="col-md-6 contact-field">
                                {{ Form::label('image', "Image*", array('class' => 'control')) }}
                                {{ Form::file('image', array('class'=>'form-control', 'multiple'=>false )) }}
                                <br> </div>
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
                                <select class="skill-multiple form-control" multiple="multiple" name="volunteeringSkill[]">

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

                        {{ Form::submit('Update', ['class' => 'btn btn-success']) }}

                        {{--<div class="form-group">
                            {{ Form::submit('Update', ['class' => 'btn btn-success']) }}
                        </div>--}}

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

