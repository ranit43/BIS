@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {{--Showing the Search Results with the selected Post:
                    <hr>--}}
                    <a href="{{ route('project.create') }}">Add your projects </a>
                    <br>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ProjectID</th>
                            <th>Name</th>
                            <th>Link</th>
                            <th>Details</th>
                            <th>UserID</th>
                            <th>User</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($projects))
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    {{--<td><a href="{{ route('project.show_project', $project->id) }}">{{ $project->title }}</a> </td>--}}
                                    <td>{{ $project->name }} </td>
                                    {{--<td><a href="{{ route('project.show_project', $project->id) }}">{{ $project->link }}</a> </td>--}}
                                    <td><a href="{!! $project->link !!}">{{ $project->link }}</a> </td>
                                    {{--<td>{{ $project->link }}</td>--}}
                                    <td>{{ $project->details }}</td>
                                    <td>{{ $project->user_id }}</td>
                                    <td>{{ \App\User::where('id', $project->user_id)->pluck('name') }}</td>

                                    @if( $authUser->id == $project->user_id )
                                        <td><a href="{{ route('project.edit', $project->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>
                                        <td><a href="{{ route('project.delete', $project->id) }}"><button class="btn btn-danger" type="button">Delete </button></a></td>
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