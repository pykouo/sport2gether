@extends('layouts.main')

@section('title', '| User')

@section('content')
    {{-- change their personal information --}}
    <section id="user" class="parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3 class="text-center">Change Personal Info</h3>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="名字" disabled>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="原本的email" disabled>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnEmail">
                                change
                            </button>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"
                                       disable>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btnPassword">
                                change
                            </button>
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
                                    <li class="activity-topic col-md-6">Topic</li>
                                    <li class="activity-person-count col-md-1">Vacancy</li>
                                    <li class="activity-reply-count col-md-1">Replies</li>
                                    <li class="activity-freshness col-md-2">Freshness</li>
                                </ul>
                            </li>
                            <li class="activity-body">

                                <ul class="activity-title">
                                    <li class="activity-type col-md-2"><span class="tag label
                                    label-success">basketball</span></li>
                                    <li class="activity-info col-md-6">
                                        <a class="topic-link" href="">Looking for girls interested in basketball</a>
                                        <p class="topic-author">PEI-YU, KUO</p>
                                    </li>
                                    <li class="activity-person-count col-md-1">3</li>
                                    <li class="activity-reply-count col-md-1"><i class="fa fa-comment-o"
                                                                                 aria-hidden="true"></i>20
                                    </li>
                                    <li class="activity-freshness col-md-2">2017/10/11</li>
                                </ul>
                                <ul class="activity-title">
                                    <li class="activity-type col-md-2"><span class="tag label
                                    label-success">basketball</span></li>
                                    <li class="activity-info col-md-6">
                                        <a class="topic-link" href="">Looking for girls interested in basketball</a>
                                        <p class="topic-author">PEI-YU, KUO</p>
                                    </li>
                                    <li class="activity-person-count col-md-1">3</li>
                                    <li class="activity-reply-count col-md-1"><i class="fa fa-comment-o"
                                                                                 aria-hidden="true"></i>20
                                    </li>
                                    <li class="activity-freshness col-md-2">2017/10/11</li>
                                </ul>
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
                                    <li class="activity-topic col-md-6">Topic</li>
                                    <li class="activity-person-count col-md-1">Vacancy</li>
                                    <li class="activity-reply-count col-md-1">Replies</li>
                                    <li class="activity-freshness col-md-2">Freshness</li>
                                </ul>
                            </li>
                            <li class="activity-body">

                                <ul class="activity-title">
                                    <li class="activity-type col-md-2"><span class="tag label
                                    label-success">basketball</span></li>
                                    <li class="activity-info col-md-6">
                                        <a class="topic-link" href="">Looking for girls interested in basketball</a>
                                        <p class="topic-author">PEI-YU, KUO</p>
                                    </li>
                                    <li class="activity-person-count col-md-1">0</li>
                                    <li class="activity-reply-count col-md-1"><i class="fa fa-comment-o"
                                                                                 aria-hidden="true"></i>20
                                    </li>
                                    <li class="activity-freshness col-md-2">2017/10/11</li>
                                </ul>
                                <ul class="activity-title">
                                    <li class="activity-type col-md-2"><span class="tag label
                                    label-success">basketball</span></li>
                                    <li class="activity-info col-md-6">
                                        <a class="topic-link" href="">Looking for girls interested in basketball</a>
                                        <p class="topic-author">PEI-YU, KUO</p>
                                    </li>
                                    <li class="activity-person-count col-md-1">0</li>
                                    <li class="activity-reply-count col-md-1"><i class="fa fa-comment-o"
                                                                                 aria-hidden="true"></i>20
                                    </li>
                                    <li class="activity-freshness col-md-2">2017/10/11</li>
                                </ul>
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

        $('#btnEmail').on('click', function (e) {

        });
    </script>
@stop