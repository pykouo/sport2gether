@extends('layouts.main')

@section('title', '| Activity List')

@section('content')
    <section id="intro" class="parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3 class="wow bounceIn" data-wow-delay="0.9s">Find Sport Partners</h3>
                    <h1 class="wow fadeInUp" data-wow-delay="1.6s">Sport2gether</h1>
                    <a href="#list" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs"
                       data-wow-delay="2.3s">Find MORE</a>
                    <a href="/activity/new" class="btn btn-lg btn-danger smoothScroll wow fadeInUp" data-wow-delay="2
                    .3s">Start Your Own Activity</a>
                </div>
            </div>
        </div>
    </section>
    <section id="list" class="activity-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>In Progress</h3>
                    <div class="tag-list">
                        <div class="btn btn-sm btn-default active" id="all">All</div>
                        <div class="btn btn-sm btn-default" id="basketball">Basketball</div>
                        <div class="btn btn-sm btn-default" id="baseball">Baseball</div>
                        <div class="btn btn-sm btn-default" id="swim">Swim</div>
                        <div class="btn btn-sm btn-default" id="soccer">Soccer</div>
                    </div>

                    <div class="activity-content">
                        <ul class="activity-list">
                            <li class="activity-header">
                                <ul class="activity-title">
                                    <li class="activity-type col-md-2">Type</li>
                                    <li class="activity-topic col-md-6">Topic</li>
                                    <li class="activity-person-count col-md-1">Vacancy</li>
                                    <li class="activity-reply-count col-md-1">Replies</li>
                                    <li class="activity-freshness col-md-2">Freshness</li>
                                </ul>
                            </li>
                            <li class="activity-body">
                                @if(isset($activities))
                                    @foreach($activities->activities as $activity)
                                        @if($activity->status == "running")
                                            <ul class="activity-title {{$activity->type}}">
                                                <li class="activity-type col-md-2"><span class="tag label
                                    label-success">{{$activity->type}}</span></li>
                                                <li class="activity-info col-md-6">
                                                    <a class="topic-link"
                                                       href="/activities/{{$activity->id}}">{{$activity->topic}}</a>
                                                    <p class="topic-author">{{$activity->user->username}}</p>
                                                </li>
                                                <li class="activity-person-count col-md-1">{{$activity->people}}</li>
                                                <li class="activity-reply-count col-md-1"><i class="fa fa-comment-o"
                                                                                             aria-hidden="true"></i>{{$activity->comment_count}}
                                                </li>
                                                <li class="activity-freshness col-md-2">{{$activity->updated_at}}</li>
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

@section('scripts')
    <script>
        $('.tag-list .btn').on('click', function () {
            var tag = $(this).attr('id');
            if (tag == 'all') {
                $('.activity-body .activity-title').fadeIn(450);
                if (!$(this).hasClass('active')) {
                    $('.active').removeClass('active');
                    $(this).addClass(' active');
                }

            } else {
                $('.active').removeClass('active');
                $(this).addClass(' active');
                console.log($('.activity-body').not('.' + tag));
                var $el = $('.activity-body .' + tag).fadeIn(450);
                $('.activity-body .activity-title').not($el).hide();
            }
        });

    </script>
@stop