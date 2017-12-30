@extends('layouts.main')

@section('title', '| Activity Detail')

@section('stylesheets')
    <link rel="stylesheet" href="{{url('/css/new-activity.css')}}">
@stop
@section('content')

    <section id="activity-detail" class="activity-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" role="form" method="POST"
                          action="{{url('/user/activity/'. $activity->id)}}">
                        {{csrf_field()}}
                        <input type="text" value="{{$activity->id}}" hidden name="activity_id">
                        <div class="form-group">
                            <div class="tag-list">
                                <label for="tag" class="col-md-4 control-label">Sport Type: </label>
                                <div class="col-md-6">
                                    {{--only show the real tag--}}
                                    <div class="btn btn-sm btn-default @if($activity->type == "basketball") active @endif "
                                         id="basketball">Basketball
                                    </div>
                                    <div class="btn btn-sm btn-default @if($activity->type == "baseball") active @endif "
                                         id="baseball">Baseball
                                    </div>
                                    <div class="btn btn-sm btn-default @if($activity->type == "swim") active @endif "
                                         id="swim">Swim
                                    </div>
                                    <div class="btn btn-sm btn-default @if($activity->type == "soccer") active @endif "
                                         id="soccer">Soccer
                                    </div>
                                    <input id="tag" type="text" name="tag" hidden value="{{$activity->type}}">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="topic" class="col-md-4 control-label">Topic</label>
                            <div class="col-md-6">
                                <input id="topic" type="text" class="form-control" name="topic"
                                       value="{{$activity->topic}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time" class="col-md-4 control-label">Time</label>
                            <div class="col-md-6">
                                <input id="time" type="text" class="form-control" name="time"
                                       value="{{$activity->time}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Location</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location"
                                       value="{{$activity->location}}"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numOfMember" class="col-md-4 control-label"># of partners you need</label>
                            <div class="col-md-6">
                                <input id="numOfMember" type="text" class="form-control" name="numOfMember"
                                       value="{{$activity->people}}"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">description</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description"
                                >{{$activity->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    {{--this part can only be seen if you're the author--}}
                    <hr>
                    <form action="">
                        <h3>Partners Management</h3>
                        <div class="form-group">
                            <label for="partner-list" class="col-md-4 control-label">Partners</label>
                            <div class="col-md-6">
                                <ul id="partner-list" class="member-list">
                                    @foreach($activity->applicants as $applicant)
                                        @if($applicant->applied)
                                            <li>
                                                <span class="gender">
                                                    <i class="fa fa-@if($applicant->gender=="female")venus @elseif($applicant->gender=="male")mars @elseif($applicant->gender=="other")neuter @endif"
                                                       aria-hidden="true"></i>
                                                </span>
                                                <span class="name">{{$applicant->username}}</span>
                                                <span class="phone">{{$applicant->phone}}</span>
                                                <a
                                                        class="btn btn-sm btn-danger pull-right confirm-apply"
                                                        data-confirm="0" data-activity-id="{{$activity->id}}"
                                                        data-user-id="{{$activity->user->id}}"
                                                        data-applicant-user-id="{{$applicant->id}}">X
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="applicant-list" class="col-md-4 control-label">Applicants</label>
                            <div class="col-md-6">
                                <ul id="applicant-list" class="member-list">
                                    @foreach($activity->applicants as $applicant)
                                        @if(!$applicant->applied)
                                            <li>
                                        <span class="gender">
                                                <i class="fa fa-@if($applicant->gender=="female")venus @elseif($applicant->gender=="male")mars @elseif($applicant->gender=="other")neuter @endif"
                                                   aria-hidden="true"></i>
                                            </span>
                                                <span class="name">{{$applicant->username}}</span>
                                                <a class="btn btn-sm btn-danger pull-right delete-apply"
                                                   data-activity-id="{{$activity->id}}"
                                                   data-user-id="{{$activity->user->id}}"
                                                   data-applicant-user-id="{{$applicant->id}}">X
                                                </a>
                                                <a class="btn btn-sm btn-success pull-right confirm-apply"
                                                   data-confirm="1" data-activity-id="{{$activity->id}}"
                                                   data-user-id="{{$activity->user->id}}"
                                                   data-applicant-user-id="{{$applicant->id}}">O
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div id="message" class="alert alert-danger" hidden>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
@section('scripts')
    <script>
        $('.tag-list .btn').on('click', function () {
            $('.active').removeClass('active');
            $(this).addClass(' active');
            var tag = $(this).attr('id');
            $('#tag').val(tag);
//            console.log($('#tag').val());
        });
        //    $('.tag-list .btn').on('click', function () {
        //        $('.active').removeClass('active');
        //        $(this).addClass(' active');
        //        var tag = $(this).attr('id');
        //        $('#tag').val(tag);
        ////            console.log($('#tag').val());
        //    });
        //
        //    $('ul.dropdown-menu>li').on('click', function () {
        ////            console.log($(this).text());
        ////            console.log($(this).parent().parent());
        //        $(this).parent().parent().find('button').find('.value').text($(this).text());
        //        $('#numOfMember').val($(this).text());
        //    });
        //
        //    $('ul.member-list > li > .btn').on('click', function () {
        //        if ($(this).hasClass('btn-danger')) {
        //            //not accept this person join to group
        //            $(this).parent().remove();
        //        }
        //        else {
        //            // accept this person join to group
        ////                    ajax #partner-list
        //        }
        //    })

        if ($('#partner-list').children().length === 0) {
            $('#partner-list').append("<li><span class='name'>NULL</span></li>");
        }

        $('.confirm-apply').click(function () {
            var confirm = $(this).data('confirm');
            var activity_id = $(this).data('activity-id');
            var user_id = $(this).data('user-id');
            var applicant_user_id = $(this).data('applicant-user-id');
            $.ajax({
                url: "http://140.118.109.185/api/activities/applied",
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: {
                    activity_id: activity_id,
                    user_id: user_id,
                    applicant_user_id: applicant_user_id,
                    confirm: confirm
                },
                success: function (data) {
                    if (!data.error) {
                        location.reload();
                    } else {
                        $("#message").html(data.message);
                        $("#message").show();
                    }
                },
                error: function (err, status, errorThrown) {
                    // console.log(err);
                }
            });
        });
        $(".delete-apply").click(function () {
            var activity_id = $(this).data('activity-id');
            var user_id = $(this).data('user-id');
            var applicant_user_id = $(this).data('applicant-user-id');
            $.ajax({
                url: "http://140.118.109.185/api/activities/cancel",
                method: "POST",
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                data: {
                    activity_id: activity_id,
                    user_id: user_id,
                    applicant_user_id: applicant_user_id
                },
                success: function (data) {
                    if (!data.error) {
                        location.reload();
                    } else {
                        $("#message").html(data.message);
                        $("#message").show();
                    }
                },
                error: function (err, status, errorThrown) {
                    console.log(err);
                }
            });
        });
    </script>
@stop