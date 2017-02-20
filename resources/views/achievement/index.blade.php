@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {{--Showing the Search Results with the selected Post:
                    <hr>--}}
                    <a href="{{ route('achievement.create') }}">Add your achievements </a>
                    <br>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>AchievementID</th>
                            <th>Title</th>
                            <th>Issuer</th>
                            <th>Year</th>
                            <th>Details</th>
                            <th>UserID</th>
                            <th>User</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($achievements))
                            @foreach($achievements as $achievement)
                                <tr>
                                    <td>{{ $achievement->id }}</td>
                                    {{--<td><a href="{{ route('achievement.show_achievement', $achievement->id) }}">{{ $achievement->title }}</a> </td>--}}
                                    <td>{{ $achievement->title }} </td>
                                    <td>{{ $achievement->issuer }}</td>
                                    <td>{{ $achievement->year }}</td>
                                    <td>{{ $achievement->details }}</td>
                                    <td>{{ $achievement->user_id }}</td>
                                    <td>{{ \App\User::where('id', $achievement->user_id)->pluck('name') }}</td>

                                    @if( $authUser->id == $achievement->user_id )
                                        <td><a href="{{ route('achievement.edit', $achievement->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>
                                        <td><a href="{{ route('achievement.delete', $achievement->id) }}"><button class="btn btn-danger" type="button">Delete </button></a></td>
                                    @else
                                        <td>Edit</td>
                                        <td>Delete</td>
                                    @endif

                                </tr>
                            @endforeach
                        @else
                            No data found
                        @endif
                        </tbody>
                    </table>

                    {{--<br>
                    <br>
                    @foreach($posts as $post)
                        <div class="showPost">

                            Title:  {!! $post->title !!}
                            <br>
                            Category: {!! $post->category !!}
                            <br>
                            Details: {!! $post->details !!}
                            <br>
                            User: {!! $post->user_id !!}
                            <br>

                            <hr>
                        </div>
                    @endforeach--}}
                </div>
            </div>
        </div>
    </div>


@endsection