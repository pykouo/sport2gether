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
                    <div class="alert alert-danger" hidden>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="">
                        <div class="form-group">
                            <div class="tag-list">
                                <label for="tag" class="col-md-4 control-label">Sport Type: </label>
                                <div class="col-md-6">
                                    {{--only show the real tag--}}
                                    <div class="btn btn-sm btn-default" id="basketball">{{$activity->type}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="topic" class="col-md-4 control-label">Topic</label>
                            <div class="col-md-6">
                                <input id="topic" type="text" class="form-control" name="topic"
                                       value="{{$activity->topic}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-4 control-label">Author</label>
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author"
                                       value="{{$activity->user->username}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time" class="col-md-4 control-label">Time</label>
                            <div class="col-md-6">
                                <input id="time" type="text" class="form-control" name="time"
                                       value="{{$activity->time}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Location</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location"
                                       value="{{$activity->location}}"
                                       disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numOfMember" class="col-md-4 control-label"># of partners you need</label>
                            <div class="col-md-6">
                                <input id="numOfMember" type="text" class="form-control" name="numOfMember"
                                       value="{{$activity->people}}"
                                       disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">description</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description"
                                          disabled>{{$activity->description}}</textarea>
                            </div>
                        </div>
                        {{--this part can only be seen if you're the author--}}
                        @if($activity->user->id != \Session::get('user_id') )
                            <div class="form-group text-center">
                                <div class="col-md-12">
                                    <a id="apply" data-activity-id="{{$activity->id}}"
                                       data-user-id="{{$activity->user->id}}"
                                       data-applicant-user-id="{{\Session::get('user_id')}}" class="btn btn-danger">
                                        @if($activity->have_apply) Cancel Apply @else Apply @endif
                                    </a>
                                </div>
                            </div>
                        @endif
                    </form>
                    <hr>
                    <form class="form-horizontal" role="form" method="POST" action="{{url('/comments')}}">
                        {{csrf_field()}}
                        {{--discussssss--}}
                        <div id="discuss">
                            <h3>Discussion</h3>
                            <div class="col-md-8 col-md-offset-2">
                                @if($activity->comments != null)
                                    @foreach($activity->comments as $comment)
                                        <div class="card">
                                            <div class="col-md-3 person-info">
                                                <div class="col-md-12">
                                                    <div class="gender-icon gender-{{$comment->user->gender}}-icon"></div>
                                                </div>
                                                <div class="col-md-12 name">{{$comment->user->username}}</div>
                                                <div class="col-md-12 time">{{$comment->updated_at}}</div>
                                            </div>
                                            <div class="col-md-9 person-info">
                                                <p class="comment">{{$comment->comment}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                @if(session('message'))
                                    <div class="alert alert-danger">
                                        {{session('message')}}
                                    </div>
                                @endif
                                {{--create new commet--}}
                                <div class="card newCard">
                                    <h3>Leave A Comment</h3>
                                    <div class="col-md-3 person-info">
                                        <div class="col-md-12">
                                            <div class="gender-icon gender-{{$comment->user->gender}}-icon"></div>
                                        </div>
                                        <div class="col-md-12 name">{{\Session::get('username')}}</div>
                                        <div class="col-md-12 time">{{\Carbon\Carbon::now()}}</div>
                                    </div>
                                    <div class="col-md-9 person-info">
                                            <textarea name="comment" class="form-control" id="newcomment" rows="10"
                                            ></textarea>
                                    </div>
                                    <input type="text" name="activity_id" value="{{$activity->id}}" hidden>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
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
            $('#partner-list').append("<li><span>NULL</span></li>");
        }
        $('#apply').click(function () {
            var activity_id = $(this).data('activity-id');
            var user_id = $(this).data('user-id');
            var applicant_user_id = $(this).data('applicant-user-id');
            console.log(activity_id + " " + user_id + " " + applicant_user_id);
            $.ajax({
                url: "http://140.118.109.185/api/activities/apply",
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