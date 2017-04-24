@extends('layouts.master')



@section('content')

    <section class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card edit">
                    <div class="single edit-field">

                        <h4>notification View Page.</h4>

                        <table class="table table-bordered">
                            <tbody>
                            @if(count($notifications))
                                @foreach($notifications as $notification)
                                    <tr>
                                        <td>{{ $notification->body }}</td>
                                        <td>{{ $notification->created_at->diffForHumans() }}</td>
                                        {{--<td><a href="{{ route('skill.edit', $skill->id) }}"><button class="btn btn-primary" type="button">EDit</button></a></td>--}}
                                        <td>
                                            <a href="{{ route('user.user_edit', ['id'=> $notification->user_id, 'redirect_url'=>'notifications']) }}">
                                                <button class="btn btn-primary" type="button">
                                                    Edit
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

@endsection