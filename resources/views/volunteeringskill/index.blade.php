<!DOCTYPE html>
<html>
<head>
    <title>  </title>
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
</head>
<body>
<h1> Profile Edit Page.</h1>
@if(session('success'))
    {{ session('success') }}

@elseif(session('error'))
    {{ session('error') }}

@endif

<div class="well">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @if(count($volunteeringskills))
                    @foreach($volunteeringskills as $volunteeringskill)
                        <tr>
                            <td>{{ $volunteeringskill->id }}</td>
                            <td>{{ $volunteeringskill->name }}</td>
                            <td><a href="{{ route('volunteeringskill.edit', $volunteeringskill->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>
                            <td><a href="{{ route('volunteeringskill.delete', $volunteeringskill->id) }}"><button class="btn btn-danger" type="button">Delete </button></a></td>
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

</body>
</html>
