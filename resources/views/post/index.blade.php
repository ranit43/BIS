@extends('layouts.master')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content')

    {{--<div class="overlay"></div>--}}
    <div class="valign-center">
        <div class="container">

            {{--<section class="container">--}}
            {{--</section>--}}

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card posts-all-threads">

                        {{--<div class="posts-title">
                            <h4>All Threads: </h4>
                            <div class="button-group">
                                <p>
                                    <a href="{!! route('post.create') !!}" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-plus"></span> CREATE A NEW POST
                                    </a>
                                </p>
                            </div>
                        </div>--}}

                        <div class="thread-title">
                            <h4>All Posts: </h4>
                            <div class="button-group">
                                <p>
                                    <a href="{!! route('post.create') !!}" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-plus"></span> {{--CREATE A NEW POST--}}
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @if(count($posts))
                @foreach($posts as $post)
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="card post">
                                <div class="single-post">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h5><strong>{{ $post->title }}</strong></h5>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="button-group">
                                                @if( $authUser->role=="Admin" || $authUser->id == $post->user_id )
                                                    {{--<a href="{{ route('post.edit', $post->id) }}" class="btn btn-info btn-lg">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>--}}
                                                    <a href="{{ route('post.edit', $post->id) }}">
                                                        <button class="btn btn-primary" type="button">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
                                                    {{--<a href="{{ route('post.edit', $post->id) }}"><button class="btn btn-primary" type="button">EDit</button></a>--}}
                                                    {{--<a href="{{ route('post.delete', $post->id) }}"><button class="btn btn-danger" type="button">Delete </button></a>--}}
                                                    {{--<a href="{{ route('post.delete', $post->id) }}">--}}
                                                    {{--<button class="btn btn-danger" type="button">--}}
                                                    {{--<span class="glyphicon glyphicon-remove"></span>--}}
                                                    {{--</button>--}}
                                                    {{--</a>--}}

                                                    {{--data-placement="bottom"--}}
                                                    <a class="btn btn-danger" data-toggle="confirmation"
                                                       data-title="Delete Post?" data-placement="right"
                                                       href="{{ route('post.delete', $post->id) }}" >
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                    </a>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <p>Category:<strong> {{ $post->category }}</strong></p>
                                    {{--<p>{{ $post->details }}</p>--}}
                                    {{--<p>{{ str_limit( $post->details, $limit = 15, $end = '...') }}</p>--}}

                                    {{--{{ $notification->created_at->diffForHumans() }}--}}
                                    {{--<p>{{ \App\User::where('id', $post->user_id)->pluck('name') }}</p>--}}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="dateshow">
                                                <p>{{ str_limit( $post->details, $limit = 30, $end = '...') }}</p>
                                                {{--<p>Created:  {{ $post->created_at->diffForHumans() }}</p>--}}
                                                <p>Edited:  {{ $post->updated_at->diffForHumans() }}</p>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="button-group">
                                                @foreach($users as $user)
                                                    @if($user->id == $post->user_id )
                                                        <img class="img-circle img-responsive" src="{{ asset( $user->image ) }}" alt="{{  $user->name }}" style="width:50px;height:50px;">
                                                        <div class="username">
                                                            <p>{{ $user->name }}</p>
                                                        </div>
                                                        {{--<br>--}}
                                                    @endif
                                                @endforeach

                                                <a href="{{ route('post.show_post', $post->id) }}">
                                                    <button class="btn btn-success" type="button">
                                                        <span class="glyphicon glyphicon-share-alt"></span>
                                                    </button>
                                                </a>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                <div class="postpage">
                    {{ $posts->links() }}
                </div>

            @else
                No data found
            @endif
        </div>
    </div>
@endsection

@section('scripts')

    <!-- for Datatable -->

    {{--<script src="{{ asset('js/jquery.js') }}"></script>--}}
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap-confirmation.min.js') }}"></script>
    <script>

        $( document ).ready( function() {
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
// other options
            });
        });
    </script>


@stop

    {{--<section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card achievements">
                    <div class="achievement-title">
                        <h4>All Threads: </h4>
                        <div class="button-group">
                            <p>
                                <a href="{!! route('post.create') !!}" class="btn btn-info btn-lg">
                                    <span class="glyphicon glyphicon-plus"></span> CREATE A NEW POST
                                </a>
                            </p>
                        </div>
                    </div>
                    @if(count($posts))
                        @foreach($posts as $post)
                            <div class="single-achievement">
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

                                <p><a href="{{ route('post.show_post', $post->id) }}">See full post with comment</a> </p>

                                <p>Category: {{ $post->category }}</p>
                                <p>{{ $post->details }}</p>
                                <p>By {{ \App\User::where('id', $post->user_id)->pluck('name') }}</p>

                            </div>
                        @endforeach
                    @else
                        No data found
                    @endif
                </div>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="well">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    --}}{{--Showing the Search Results with the selected Post:
                    <hr>--}}{{--
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

                    --}}{{--<br>
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
                    @endforeach--}}{{--
                </div>
            </div>
        </div>
    </div>--}}



