@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {{--Showing the Search Results with the selected Post:
                    <hr>--}}
                    <a href="{{ route('paper.create') }}">Add your papers </a>
                    <br>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>paperID</th>
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
                        @if(count($papers))
                            @foreach($papers as $paper)
                                <tr>
                                    <td>{{ $paper->id }}</td>
                                    {{--<td><a href="{{ route('paper.show_paper', $paper->id) }}">{{ $paper->title }}</a> </td>--}}
                                    <td>{{ $paper->name }} </td>
                                    {{--<td><a href="{{ route('paper.show_paper', $paper->id) }}">{{ $paper->link }}</a> </td>--}}
                                    <td><a href="{!! $paper->link !!}">{{ $paper->link }}</a> </td>
                                    {{--<td>{{ $paper->link }}</td>--}}
                                    <td>{{ $paper->details }}</td>
                                    <td>{{ $paper->user_id }}</td>
                                    <td>{{ \App\User::where('id', $paper->user_id)->pluck('name') }}</td>

                                    @if( $authUser->id == $paper->user_id )
                                        <td><a href="{{ route('paper.edit', $paper->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>
                                        <td><a href="{{ route('paper.delete', $paper->id) }}"><button class="btn btn-danger" type="button">Delete </button></a></td>
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