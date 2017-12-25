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
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{--this part can only be seen if you're the author--}}
                        <div class="form-group">
                            <div class="tool pull-right"><span id="delete">delete</span><span
                                        id="edit">edit</span></div>
                        </div>
                        {{--******************--}}
                        <div class="form-group">
                            <div class="tag-list">
                                <label for="tag" class="col-md-4 control-label">Sport Type: </label>
                                <div class="col-md-6">
                                    {{--only show the real tag--}}
                                    <div class="btn btn-sm btn-default" id="basketball">Basketball</div>
                                    {{--<div class="btn btn-sm btn-default" id="baseball">Baseball</div>--}}
                                    {{--<div class="btn btn-sm btn-default" id="swim">Swim</div>--}}
                                    {{--<div class="btn btn-sm btn-default" id="soccer">Soccer</div>--}}
                                    {{--<input id="tag" type="text" name="tag" hidden>--}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="topic" class="col-md-4 control-label">Topic</label>
                            <div class="col-md-6">
                                <input id="topic" type="text" class="form-control" name="topic" value="test" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-md-4 control-label">Author</label>
                            <div class="col-md-6">
                                <input id="author" type="text" class="form-control" name="author" value="test" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="time" class="col-md-4 control-label">Time</label>
                            <div class="col-md-6">
                                <input id="time" type="text" class="form-control" name="time" value="test" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location" class="col-md-4 control-label">Location</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="test"
                                       disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numOfMember" class="col-md-4 control-label"># of partners you need</label>
                            <div class="col-md-6">
                                <input id="numOfMember" type="text" class="form-control" name="numOfMember" value="1"
                                       disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">description</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description"
                                          disabled>testestsetsetsetsetsetsetetsets</textarea>
                            </div>
                        </div>
                        {{--this part can only be seen if you're the author--}}
                        <hr>
                        <h3>Partners Management</h3>
                        <div class="form-group">
                            <label for="partner-list" class="col-md-4 control-label">Partners</label>
                            <div class="col-md-6">
                                <ul id="partner-list" class="member-list">
                                    {{--girl--}}
                                    {{--<i class="fa fa-venus" aria-hidden="true"></i>--}}
                                    {{--boy--}}
                                    {{--<i class="fa fa-mars" aria-hidden="true"></i>--}}
                                    {{--other--}}
                                    {{--<i class="fa fa-neuter" aria-hidden="true"></i>--}}
                                    <li>
                                        <span class="gender"><i class="fa fa-venus" aria-hidden="true"></i></span>
                                        <span class="name">Lily White</span>
                                        <span class="phone">09461234712</span>
                                        <button type="button" class="btn btn-sm btn-danger pull-right">X</button>
                                    </li>
                                    <li>
                                        <span class="gender"><i class="fa fa-mars" aria-hidden="true"></i></span>
                                        <span class="name">Kevin White</span>
                                        <span class="phone">09461234712</span>
                                        <button type="button" class="btn btn-sm btn-danger pull-right">X</button>
                                    </li>
                                    <li>
                                        <span class="gender"><i class="fa fa-neuter" aria-hidden="true"></i></span>
                                        <span class="name">Neuter White</span>
                                        <span class="phone">09461234712</span>
                                        <button type="button" class="btn btn-sm btn-danger pull-right">X</button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="applicant-list" class="col-md-4 control-label">Applicants</label>
                            <div class="col-md-6">
                                <ul id="applicant-list" class="member-list">
                                    <li>
                                        <span class="gender"><i class="fa fa-venus" aria-hidden="true"></i></span>
                                        <span class="name">Jane Doe</span>
                                        <button type="button" class="btn btn-sm btn-danger pull-right">X</button>
                                        <button type="button" class="btn  btn-sm btn-success pull-right">O</button>
                                    </li>
                                    <li>
                                        <span class="gender"><i class="fa fa-venus" aria-hidden="true"></i></span>
                                        <span class="name">Jane Doe</span>
                                        <button type="button" class="btn btn-sm btn-danger pull-right">X</button>
                                        <button type="button" class="btn  btn-sm btn-success pull-right">O</button>
                                    </li>
                                    <li>
                                        <span class="gender"><i class="fa fa-venus" aria-hidden="true"></i></span>
                                        <span class="name">Jane Doe</span>
                                        <button type="button" class="btn btn-sm btn-danger pull-right">X</button>
                                        <button type="button" class="btn  btn-sm btn-success pull-right">O</button>
                                    </li>
                                    <li>
                                        <span class="gender"><i class="fa fa-venus" aria-hidden="true"></i></span>
                                        <span class="name">Jane Doe</span>
                                        <button type="button" class="btn btn-sm btn-danger pull-right">X</button>
                                        <button type="button" class="btn  btn-sm btn-success pull-right">O</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{--************************--}}

                        <hr>
                        {{--discussssss--}}
                        <div id="discuss">
                            <h3>Discussion</h3>
                            <div class="col-md-8 col-md-offset-2">
                                <div class="card">
                                    <div class="col-md-3 person-info">
                                        <div class="col-md-12">
                                            <div class="gender-icon gender-female-icon"></div>
                                        </div>
                                        <div class="col-md-12 name">Jane Doe</div>
                                        <div class="col-md-12 time">2017/11/12 13:40</div>
                                    </div>
                                    <div class="col-md-9 person-info">
                                        <p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                            in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                            officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="col-md-3 person-info">
                                        <div class="col-md-12">
                                            <div class="gender-icon gender-male-icon"></div>
                                        </div>
                                        <div class="col-md-12 name">Jane Doe</div>
                                        <div class="col-md-12 time">2017/11/12 13:40</div>
                                    </div>
                                    <div class="col-md-9 person-info">
                                        <p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                            in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                            officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="col-md-3 person-info">
                                        <div class="col-md-12">
                                            <div class="gender-icon gender-neuter-icon"></div>
                                        </div>
                                        <div class="col-md-12 name">Jane Doe</div>
                                        <div class="col-md-12 time">2017/11/12 13:40</div>
                                    </div>
                                    <div class="col-md-9 person-info">
                                        <p class="comment">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                            in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                            officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                                {{--create new commet--}}
                                <div class="card newCard">
                                    <h3>Leave A Comment</h3>
                                    <div class="col-md-3 person-info">
                                        <div class="col-md-12">
                                            <div class="gender-icon gender-neuter-icon"></div>
                                        </div>
                                        <div class="col-md-12 name">Jane Doe</div>
                                        <div class="col-md-12 time">2017/11/12 13:40</div>
                                    </div>
                                    <div class="col-md-9 person-info">
                                            <textarea name="newcomment" class="form-control" id="newcomment" rows="10"
                                            ></textarea>
                                    </div>
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
    </script>
@stop