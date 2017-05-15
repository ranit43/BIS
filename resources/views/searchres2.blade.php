@extends('layouts.master')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@section('content')

    <section class="search-result">
        <div class="container">

            <section class="search-result">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @if($errors->has('skill') )
                            <div class="alert alert-danger">
                                {{ $errors->first('skill') }}
                            </div>

                        @endif

                        {!! Form::open(array('route' => 'searchResult') ) !!}

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">

                                    {{--<h5><strong>Select Dept:</strong></h5>--}}
                                    <h5>Select Dept:</h5>
                                    @if( count($fields) )

                                        <select class="form-control" name="field" id="field">
                                            <option value=""  > -- </option>
                                            @foreach($fields as $field )

                                                {{--{!! Form::checkbox('skill[]', $skill->id, in_array($skill->id, $mySkills) ? true : false) !!}--}}
                                                <option value="{{ $field }}"  > {{ $field  }}  </option>

                                            @endforeach
                                        </select>
                                    @else
                                        no field
                                    @endif
                                </div>
                                @if( count($fields_skills) )

                                    @foreach($fields_skills as $key => $fields_skill)
                                        <div class="form-group field-set" id="{{$key}}">
                                            <h5>Select Skills</h5>
                                            {{--<h5><strong>Select Skills:</strong></h5>--}}
                                            {{--<br>--}}
                                            <select class="skill-multiple form-control" multiple="multiple" name="skill[]">
                                                @foreach($fields_skill as $skill)

                                                    <option value="{{ $skill->id }}"  > {{ $skill->name  }}  </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach

                                @else
                                    No data found
                                @endif

                            </div>

                        </div>

                        <div class="form-group">
                            {{--{{ Form::submit('Search', ['class' => 'btn btn-success']) }}--}}
                            {{--{{ Form::button('<span class="glyphicon glyphicon-remove"></span>', array('class'=>'btn btn-default', 'type'=>'submit')) }}--}}
                            {{ Form::button('<span class="glyphicon glyphicon-search"></span>', array('class'=>'btn btn-success', 'type'=>'submit')) }}
                        </div>



                        {{--{Form::button('<i class="glyphicon glyphicon-delete"></i>', array('type' => 'submit', 'class' => ''))}}--}}


                        {!! Form::close() !!}
                    </div>
                </div>
            </section>


            {{--<div class="row">--}}
                {{--<div class="col-md-10 col-md-offset-1">--}}
                    {{--<div class="row">--}}
                        {{--@foreach($users as $user)--}}
                            {{--<div class="col-md-4">--}}
                                {{--<div class="thumbnail text-center">--}}

                                    {{--<img class="img-circle img-responsive" src="{{ asset( $user->image ) }}" style="width: 150px; height: 150px" alt="{{ $user->name  }}" >--}}
                                    {{--<div class="caption">--}}
                                        {{--<h4><a href="{{ route('show_user_profile', $user->id) }}">{{ $user->name  }}</a> </h4>--}}
                                        {{--<h3>{{ $user->name  }}</a> </h3>--}}
                                        {{----}}
                                            {{--<li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>--}}

                                        {{--<a href="{{ route('paper.edit', $paper->id) }}">--}}
                                        {{--<button class="btn btn-primary" type="button">--}}
                                        {{--<span class="glyphicon glyphicon-pencil"></span>--}}
                                        {{--</button>--}}
                                        {{--</a>--}}
                                        {{--<p>...</p>--}}
                                        {{--<p>Email: {!! $user->email !!}</p>--}}
                                        {{--<p>Contact: {!! $user->contact !!}</p>--}}
                                        {{--CV: <a href="{!! $user->CV !!}">Download CV </a>--}}
                                        {{--<p>--}}
                                            {{--Professional Skill:--}}
                                            {{--<br>--}}
                                            {{--@foreach($user->skills as $skill )--}}
                                                {{--<span class="badge badge-success sr">{{$skill->name}}</span>--}}
                                            {{--@endforeach--}}
                                        {{--</p>--}}

                                        {{--<p>--}}
                                            {{--<a href="#" class="btn btn-primary" role="button">Button</a>--}}
                                            {{--<a href="#" class="btn btn-default" role="button">Button</a>--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        </div>





    </section>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.field-set').hide();
        $('.skill-multiple').select2();
        $('#field').select2().on('change', function (event) {
            console.log(event.target.value);
            $('.field-set').hide();
            $('#'+event.target.value).show();

        });
    </script>

@endsection