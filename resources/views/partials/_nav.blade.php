<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
    <div class="container">

        <!-- navbar header -->
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">Sport2gether</a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-right">
                {{--<li><a href="#intro" class="smoothScroll">Intro</a></li>--}}
                {{--<li><a href="#overview" class="smoothScroll">Overview</a></li>--}}
                {{--<li><a href="#speakers" class="smoothScroll">Speakers</a></li>--}}
                {{--<li><a href="#program" class="smoothScroll">Programs</a></li>--}}
                {{--<li><a href="#register" class="smoothScroll">Register</a></li>--}}
                <li><a href="/activities">Activity</a></li>
                @if(\Session::get('username'))
                    <li><a id="navbar-gender" class="gender-icon gender-{{\Session::get('gender')}}-icon
                                "></a></li>
                    <li><a href="/user">{{\Session::get('username')}}</a></li>
                @endif
                @if(\Session::get('username'))
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="/login">Login/Register</a></li>
                @endif
            </ul>

        </div>

    </div>
</div>