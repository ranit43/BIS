@extends('layouts.master')

@section('content')

    <section class="search-home">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4>Select talent with specific skills</h4>

                    {!! Form::open(array('route' => 'searchResult') ) !!}
                    <div class="form-group">
                        @if(count($skills))
                            <select class="skill-multiple form-control" multiple="multiple" name="skill[]">
                                @foreach($skills as $skill)

                                    {{--{!! Form::checkbox('skill[]', $skill->id, in_array($skill->id, $mySkills) ? true : false) !!}--}}
                                    <option value="{{ $skill->id }}"  > {{ $skill->name  }}  </option>

                                @endforeach
                            </select>
                        @else
                            No data found
                        @endif
                    </div>

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
        $('.skill-multiple').select2();
	</script>

@endsection