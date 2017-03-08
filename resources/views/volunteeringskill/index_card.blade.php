@extends('layouts.master')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content')

    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card edit">
                    <div class="single edit-field">

                        <h4>Volunteering Skill View Page.</h4>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>#</th>
                                {{--<th>#</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($volunteeringskills))
                                @foreach($volunteeringskills as $volunteeringskill)
                                    <tr>
                                        <td>{{ $volunteeringskill->id }}</td>
                                        <td>{{ $volunteeringskill->name }}</td>
                                        <td><a href="{{ route('volunteeringskill.edit', $volunteeringskill->id) }}">
                                                <button class="btn btn-primary" type="button">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </a>
                                        {{--</td>
                                        <td>--}}
                                            <a href="{{ route('volunteeringskill.delete', $volunteeringskill->id) }}">
                                                <button class="btn btn-danger" type="button">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                No data found
                            @endif
                            </tbody>
                        </table>

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

