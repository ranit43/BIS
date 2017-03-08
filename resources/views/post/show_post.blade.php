@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <table class="table table-bordered">
                        <tr>
                            <td>Post ID</td>
                            <td>{!! $post->id !!}</td>
                        </tr>
                        <tr>
                            <td>Post ID</td>
                            <td>{!! $post->title !!}</td>
                        </tr>
                        <tr>
                            <td>User </td>
                            <td>{!! $post->user_id !!}</td>
                        </tr>
                        <tr>
                            <td>Post Category</td>
                            <td>{!! $post->category !!}</td>
                        </tr>
                        <tr>
                            <td>Post Details</td>
                            <td>{!! $post->details !!}</td>
                        </tr>

                    </table>

                    <table class="table table-bordered">
                        @if(count($comments))
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ \App\User::where('id', $comment->user_id)->pluck('name') }}</td>

                                    <td>{{ $comment->text }}</td>
                                    {{--<td>{{ $comment->user_id }}</td>--}}


                                    @if( $authUser->id == $comment->user_id )
                                        <td><a href="{{ route('comment.edit', $comment->id) }}">
                                                <button class="btn btn-primary" type="button">
                                                    <span class="glyphicon glyphicon-pencil">

                                                    </span>
                                                </button>
                                            </a>
                                        </td>
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

                    </table>

                    {!!  Form::open( [ 'route' => 'comment.store', 'method' => 'post' ]) !!}


                    {{ Form::hidden('post_id', $post->id ) }}

                    <br/>
                    <div class="form-group">
                        {!! Form::label('text', 'Comment') !!}
                        {!! Form::textarea( 'text', null, ['size' => '85x4'], [ 'id' => 'body', 'class' => 'form-control', 'placeholder' => 'Comment on this post', 'required' ]) !!}
                    </div>

                    <br/>

                    {!!   Form::submit('Comment', ['class' => 'btn btn-success']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


@endsection