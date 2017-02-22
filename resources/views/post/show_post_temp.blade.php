@extends('layouts.master')

@section('content');


    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card posts-comment">
                    <div class="single posts-comment">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>{{ $post->title }}</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="button-group">
                                    @if( $authUser->id == $post->user_id )
                                        <a href="{{ route('post.edit', $post->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                        <a href="{{ route('post.delete', $post->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <p>Category: {{ $post->category }}</p>
                        <p>{{ $post->details }}</p>
                        <p>By {{ \App\User::where('id', $post->user_id)->pluck('name') }}</p>
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
                                                <a href="{{ route('comment.edit', $comment->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>
                                                <a href="{{ route('comment.delete', $comment->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <p>{{ $comment->text }}</p>
                                <p>By {{ \App\User::where('id', $comment->user_id)->pluck('name') }}</p>

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