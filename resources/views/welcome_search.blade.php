@extends('layouts.master')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content')
    <header id="site-header" class="site-header header-fullscreen wrapper-table">
        {{--<div id="particles-js" class="overlay-01 parallax-hero animated-gradient-bg" data-top="transform: translate3d(0px, 0px, 0px)" data-top-bottom="transform: translate3d(0px, -200px, 0px)" data-anchor-target="#site-header"></div>--}}

        {{--<img src="pic_mountain.jpg" alt="Mountain View" style="width:304px;height:228px;">--}}
        <div class="overlay"></div>
        <div class="valign-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div  class="intro text-center intro-particle">
                            <h4>BATCH INFORMATION SYSTEM</h4>
                            <p>
                                Our website gives full infromation of students of a batch or department of a particular university.
                                Besides anybody want to contact a person with some specific set of skills then he can search in our webseite
                                and see his full information and also can contact him. Select the Dept. and then select the specific set of skills
                                then search below for the talents.
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="search-result">
                                    @if($errors->has('skill') )
                                        <div class="alert alert-danger">
                                            {{ $errors->first('skill') }}
                                        </div>

                                    @endif



                                    {!! Form::open(array('route' => 'searchResult') ) !!}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="text-center"> Search For Talent</h4>

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

                                    <div class="form-group text-center">
                                        {{--{{ Form::submit('Search', ['class' => 'btn btn-success']) }}--}}
                                        {{--{{ Form::button('<span class="glyphicon glyphicon-remove"></span>', array('class'=>'btn btn-default', 'type'=>'submit')) }}--}}
                                        {{ Form::button('<span class="glyphicon glyphicon-search"> Search</span>', array('class'=>'btn btn-success btn-search', 'type'=>'submit')) }}
                                    </div>



                                    {{--{Form::button('<i class="glyphicon glyphicon-delete"></i>', array('type' => 'submit', 'class' => ''))}}--}}


                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        {{--<a href="#about" class="btn-arrow-down-round btn-o onPageNav">
            <i class="ion-ios-arrow-down"></i>
        </a>--}}
    </header>




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


{{--
{{ Form::radio('sex', 'male') }}<br>
{{ Form::radio('sex', 'female', true) }}--}}
