@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {{--Showing the Search Results with the selected Post:
                    <hr>--}}


                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>CommenttID</th>
                            <th>PostID</th>
                            <th>Texts</th>
                            <th>UserID</th>
                            <th>User</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($comments))
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->post_id }}"</td>
                                    <td>{{ $comment->text }}</td>
                                    <td>{{ $comment->user_id }}</td>
                                    <td>{{ \App\User::where('id', $comment->user_id)->pluck('name') }}</td>

                                    @if( $authUser->id == $comment->user_id )
                                        <td><a href="{{ route('comment.edit', $comment->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>
                                        <td><a href="{{ route('comment.delete', $comment->id) }}"><button class="btn btn-danger" type="button">Delete </button></a></td>
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