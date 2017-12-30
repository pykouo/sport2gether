@extends('layouts.main')

@section('title', '| User Management')

@section('content')
    {{-- change their personal information --}}
    <section id="user" class="parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="text-center">Change Personal Info</h3>
                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{session('message')}}
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"
                                       value="{{$user->username}}" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <input id="gender" type="text" class="form-control"
                                       value="{{$user->gender}}" disabled>
                            </div>
                            <input type="hidden" class="form-control" name="gender"
                                   value="{{$user->gender}}" hidden>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control"
                                       value="{{$user->phone}}" disabled>
                            </div>
                            <input type="hidden" class="form-control" name="phone"
                                   value="{{$user->phone}}" hidden>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"
                                       value="{{$user->email}}" disabled>
                            </div>
                            <input type="hidden" class="form-control" name="email"
                                   value="{{$user->email}}">
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"
                                       disable>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary center-block" id="btnChange">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section id="inprogress" class="activity-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>In Progress</h3>
                    <div class="activity-content">
                        <ul class="activity-list">
                            <li class="activity-header">
                                <ul class="activity-title">
                                    <li class="activity-type col-md-2">Type</li>
                                    <li class="activity-topic col-md-4">Topic</li>
                                    <li class="activity-person-count col-md-1">Vacancy</li>
                                    <li class="activity-reply-count col-md-1">Replies</li>
                                    <li class="activity-freshness col-md-2">Freshness</li>
                                    <li class="activity-freshness col-md-2">Action</li>
                                </ul>
                            </li>
                            <li class="activity-body">
                                <div class="alert alert-danger" hidden>
                                </div>
                                @if($activities != null)
                                    @foreach($activities as $activity)
                                        @if($activity->status == 'running')
                                            <ul class="activity-title">
                                                <li class="activity-type col-md-2"><span class="tag label
                                    label-success">{{$activity->type}}</span></li>
                                                <li class="activity-info col-md-4">
                                                    <a class="topic-link"
                                                       href="{{url('/activities/'.$activity->id )}}">{{$activity->topic}}</a>
                                                </li>
                                                <li class="activity-person-count col-md-1">{{$activity->people}}</li>
                                                <li class="activity-reply-count col-md-1"><i class="fa fa-comment-o"
                                                                                             aria-hidden="true"></i>{{$activity->comment_count}}
                                                </li>
                                                <li class="activity-freshness col-md-2">{{$activity->updated_at}}</li>
                                                <li class="activity-freshness col-md-2"><a
                                                            href="{{url('/user/activity/'.$activity->id)}}"
                                                            class="btn btn-warning btn-xs">Manage</a>
                                                    <a data-activity-id="{{$activity->id}}" data-user-id="{{\Session::get('user_id')}}"
                                                            class="btn btn-danger btn-xs activity-close">Close</a></li>
                                            </ul>
                                        @endif
                                    @endforeach
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="completed" class="activity-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Completed</h3>
                    <div class="activity-content">
                        <ul class="activity-list">
                            <li class="activity-header">
                                <ul class="activity-title">
                                    <li class="activity-type col-md-2">Type</li>
                                    <li class="activity-topic col-md-7">Topic</li>
                                    <li class="activity-freshness col-md-3">Freshness</li>
                                </ul>
                            </li>
                            <li class="activity-body">
                                @if($activities != null)
                                    @foreach($activities as $activity)
                                        @if($activity->status == 'close')
                                            <ul class="activity-title">
                                                <li class="activity-type col-md-2"><span class="tag label
                                    label-success">{{$activity->type}}</span></li>
                                                <li class="activity-info col-md-7">
                                                    <a class="topic-link">{{$activity->topic}}</a>
                                                </li>
                                                <li class="activity-freshness col-md-3">{{$activity->updated_at}}</li>
                                            </ul>
                                        @endif
                                    @endforeach
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



@stop

@section('scripts')
    <script>
        $('#btnEmail').on('click', function (e) {
            e.preventDefault();
            if ($('#email').attr('disabled')) {
                $('#email').attr('disabled', false);
            } else {
                $('#email').attr('disabled', true);
            }
        });
        $(".activity-close").click(function () {
            var activity_id = $(this).data('activity-id');
            var user_id = $(this).data('user-id');
            console.log(activity_id+" "+user_id);
            $.ajax({
                url: "http://140.118.109.185/api/activities/close",
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: {
                    activity_id: activity_id,
                    user_id: user_id
                },
                success: function (data) {
                    if (!data.error) {
                        location.reload();
                    } else {
                        $('.alert').html(data.message);
                        $('.alert').show();
                    }
                },
                error: function (err, status, errorThrown) {
                }
            });
        });
    </script>
@stop