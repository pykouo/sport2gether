@extends('layouts.main')

@section('title', '| Create Activity')

@section('stylesheets')
    <link rel="stylesheet" href="{{url('/css/new-activity.css')}}">
@stop
@section('content')

    <section id="activity-detail" class="activity-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('/activity/new')}}">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                            <div class="tag-list">
                                <label for="tag" class="col-md-4 control-label">Sport Type: </label>
                                <div class="col-md-6">
                                    <div class="btn btn-sm btn-default" id="basketball">Basketball</div>
                                    <div class="btn btn-sm btn-default" id="baseball">Baseball</div>
                                    <div class="btn btn-sm btn-default" id="swim">Swim</div>
                                    <div class="btn btn-sm btn-default" id="soccer">Soccer</div>
                                    <input id="tag" type="text" name="tag" hidden>
                                </div>
                            </div>
                            @if($errors->has('tag'))
                                <label class="control-label"><i class="fa fa-times-circle-o"></i> Input required</label>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('topic') ? ' has-error' : '' }}">
                            <label for="topic" class="col-md-4 control-label">Topic</label>
                            <div class="col-md-6">
                                <input id="topic" type="text" class="form-control" name="topic">
                            </div>
                            @if($errors->has('topic'))
                                <label class="control-label"><i class="fa fa-times-circle-o"></i> Input required</label>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label for="time" class="col-md-4 control-label">Time</label>
                            <div class="col-md-6">
                                <input id="time" type="text" class="form-control" name="time" placeholder="everyday">
                            </div>
                            @if($errors->has('time'))
                                <label class="control-label"><i class="fa fa-times-circle-o"></i> Input required</label>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location"
                                       placeholder="NTUST GYM">
                            </div>
                            @if($errors->has('location'))
                                <label class="control-label"><i class="fa fa-times-circle-o"></i> Input required</label>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('numOfMember') ? ' has-error' : '' }}">
                            <label for="numOfMember" class="col-md-4 control-label"># of partners you need</label>
                            <div class="col-md-6">
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="value">1</span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                        <li>5</li>
                                        <li>6</li>
                                    </ul>
                                </div>
                                <input id="numOfMember" type="text" name="numOfMember" hidden value="1">
                            </div>
                            @if($errors->has('numOfMember'))
                                <label class="control-label"><i class="fa fa-times-circle-o"></i> Input required</label>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">description</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description"
                                          rows="10"
                                ></textarea>
                            </div>
                            @if($errors->has('description'))
                                <label class="control-label"><i class="fa fa-times-circle-o"></i> Input required</label>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@section('scripts')
    <script>
        $('.tag-list .btn').on('click', function () {
            $('.active').removeClass('active');
            $(this).addClass(' active');
            var tag = $(this).attr('id');
            $('#tag').val(tag);
//            console.log($('#tag').val());
        });

        $('ul.dropdown-menu>li').on('click', function () {
//            console.log($(this).text());
//            console.log($(this).parent().parent());
            $(this).parent().parent().find('button').find('.value').text($(this).text());
            $('#numOfMember').val($(this).text());
        });

        $('ul.member-list > li > .btn').on('click', function () {
            if ($(this).hasClass('btn-danger')) {
                //not accept this person join to group
                $(this).parent().remove();
            }
            else {
                // accept this person join to group
//                    ajax #partner-list
            }
        })
    </script>
@stop