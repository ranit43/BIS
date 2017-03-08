@extends('layouts.master')

@section('content')

    <section class="search-home">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4>Select talent with specific skills</h4>
                    @if($errors->has('skill') )
                        <div class="alert alert-danger">
                            {{ $errors->first('skill') }}
                        </div>

                    @endif

                    {!! Form::open(array('route' => 'searchResult') ) !!}

                    <div class="form-group">

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



                    <div class="form-group">
                        {{ Form::submit('Search', ['class' => 'btn btn-success']) }}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
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