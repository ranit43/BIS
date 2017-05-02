@extends('layouts.master')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@section('content')

    <div class="container">

        <section class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="cardtop card edit ">
                        <div class="single edit-field">

                            <h4> All Notification.</h4>

                            <table class="table table-bordered">
                                <tbody>
                                @if(count($notifications))
                                    @foreach($notifications as $notification)
                                        <tr>
                                            <td>
                                                @if( $notification->is_read == 0 )
                                                    <span class="glyphicon glyphicon-info-sign">
                                            @else
                                                            <span class="glyphicon glyphicon-ok"></span>
                                                @endif
                                            </td>
                                            <td>{{ $notification->body }}</td>
                                            <td>{{ $notification->created_at->diffForHumans() }}</td>
                                            {{--<td><a href="{{ route('skill.edit', $skill->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>--}}
                                            <td>
                                                <a href="{{ route('user.user_edit', ['id'=> $notification->user_id, 'redirect_url'=>'notifications']) }}">
                                                    <button class="btn btn-primary" type="button">
                                                        <span class="glyphicon glyphicon-cog"></span>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    No data found
                                @endif
                                </tbody>
                            </table>
                            {{ $notifications->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>



@endsection