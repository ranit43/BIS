@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {{--Showing the Search Results with the selected Post:
                    <hr>--}}
                    <a href="{{ route('post.create') }}">CREATE A NEW POST </a>
                    <br>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>PostID</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Category</th>
                            <th>UserID</th>
                            <th>User</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($posts))
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><a href="{{ route('post.show_post', $post->id) }}">{{ $post->title }}</a> </td>
                                    <td>{{ $post->details }}</td>
                                    <td>{{ $post->category }}</td>
                                    <td>{{ $post->user_id }}</td>
                                    <td>{{ \App\User::where('id', $post->user_id)->pluck('name') }}</td>

                                    @if( $authUser->id == $post->user_id )
                                        <td><a href="{{ route('post.edit', $post->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>
                                        <td><a href="{{ route('post.delete', $post->id) }}"><button class="btn btn-danger" type="button">Delete </button></a></td>
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