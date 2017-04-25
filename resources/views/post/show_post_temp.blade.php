@extends('layouts.master')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content');


    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card posts-comment">
                    <div class="single posts-comment">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{ $post->title }}</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="button-group">
                                    @if( $authUser->id == $post->user_id )
                                        <a href="{{ route('post.edit', $post->id) }}">
                                            <button class="btn btn-primary" type="button">
                                               <span class="glyphicon glyphicon-pencil">

                                               </span>
                                            </button>
                                        </a>
                                        <a href="{{ route('post.delete', $post->id) }}">
                                            <button class="btn btn-danger" type="button">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p>Category: {{ $post->category }}</p>
                        <p>{{ $post->details }}</p>
                        {{--<p>By {{ \App\User::where('id', $post->user_id)->pluck('name') }}</p>--}}

                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <div class="button-group username">
                                    @foreach($users as $user)
                                        @if($user->id == $post->user_id )
                                            <img class="img-circle img-responsive" src="{{ asset( $user->image ) }}" alt="{{  $user->name }}" style="width:50px;height:50px;">
                                            <p>{{ $user->name }}</p>
                                            {{--<br>--}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{--<a href="{{ route('post.show_post', $post->id) }}"><button class="btn btn-success" type="button">Details </button></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card comments">
                    {{--<div class="achievement-title">
                        <h4>Comments: </h4>
                        <div class="button-group">
                            <p>
                                <a href="{!! route('achievement.create') !!}" class="btn btn-info btn-lg">
                                    <span class="glyphicon glyphicon-plus"></span> Add new achievement
                                </a>
                            </p>
                        </div>
                    </div>--}}
                    @if(count($comments))
                        @foreach($comments as $comment)
                            <div class="single-achievement">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>{{ $comment->title }} </h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="button-group">
                                            @if( $authUser->id == $comment->user_id )
                                                <a href="{{ route('comment.edit', $comment->id) }}">
                                                    <button class="btn btn-primary" type="button">
                                                         <span class="glyphicon glyphicon-pencil">

                                                        </span>
                                                    </button>
                                                </a>
                                                <a href="{{ route('comment.delete', $comment->id) }}">
                                                    <button class="btn btn-danger" type="button">
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                    </button>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <p>{{ $comment->text }}</p>
                                {{--<p>By {{ \App\User::where('id', $comment->user_id)->pluck('name') }}</p>--}}

                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="button-group username">
                                            @foreach($users as $user)
                                                @if($user->id == $comment->user_id )
                                                    <img class="img-circle img-responsive" src="{{ asset( $user->image ) }}" alt="{{  $user->name }}" style="width:50px;height:50px;">
                                                    <p>{{ $user->name }}</p>
                                                    {{--<br>--}}
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        No data found
                    @endif

                    {!!  Form::open( [ 'route' => 'comment.store', 'method' => 'post' ]) !!}

                    {{ Form::hidden('post_id', $post->id ) }}

                    <br/>
                    <div class="form-group">
                        {!! Form::label('text', 'Comment') !!}
                        <br>
                        {!! Form::textarea( 'text', null, ['size' => '85x4'], [ 'id' => 'body', 'class' => 'form-control', 'placeholder' => 'Comment on this post', 'required' ]) !!}
                    </div>

                    <br/>

                    {!!   Form::submit('Comment', ['class' => 'btn btn-success']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </section>


@endsection