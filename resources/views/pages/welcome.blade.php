@extends('layouts.main')

@section('title', '| HomePage')

@section('stylesheets')
@stop

@section('content')

    <!-- =========================
    INTRO SECTION
============================== -->
    <section id="intro" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <h3 class="wow bounceIn" data-wow-delay="0.9s">Find Sport Partners</h3>
                    <h1 class="wow fadeInUp" data-wow-delay="1.6s">Sport2gether</h1>
                    <a href="#overview" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs"
                       data-wow-delay="2.3s">LEARN MORE</a>
                    <a href="/register" class="btn btn-lg btn-danger smoothScroll wow fadeInUp" data-wow-delay="2
                    .3s">REGISTER
                        NOW</a>
                </div>


            </div>
        </div>
    </section>


    <!-- =========================
        OVERVIEW SECTION
    ============================== -->
    <section id="overview" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
                    <h3>This is a website for people to find their sport partners</h3>
                    <p>There's no need to exercise or do sport alone.</p>
                    <p>Join Us.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>

                <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.9s">
                    <img src="{{url('images/overview-img.jpg')}}" class="img-responsive" alt="Overview">
                </div>

            </div>
        </div>
    </section>


    <!-- =========================
        DETAIL SECTION
    ============================== -->
    <section id="detail" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="wow fadeInLeft col-md-4 col-sm-4" data-wow-delay="0.3s">
                    <i class="fa fa-trophy"></i>
                    <h3>100+ Activities</h3>
                    <p>There were more than a hundred activities in Sport2gether.</p>
                </div>

                <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
                    <i class="fa fa-futbol-o"></i>
                    <h3>30+ Sports</h3>
                    <p>There were many types of sports you could join in Sport2gether.</p>
                </div>

                <div class="wow fadeInRight col-md-4 col-sm-4" data-wow-delay="0.9s">
                    <i class="fa fa-group"></i>
                    <h3>2000+ Members</h3>
                    <p>There were more than 2000 member looking for sport partners in Sport2gether.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- =========================
        SPEAKERS SECTION
    ============================== -->
    <section id="speakers" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 wow bounceIn">
                    <div class="section-title">
                        <h2>Creative Team</h2>
                    </div>
                </div>

                <!-- Testimonial Owl Carousel section
                ================================================== -->
                <div id="owl-speakers" class="owl-carousel">

                    <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
                        <div class="speakers-wrapper">
                            <img src="{{url('images/speakers-img1.jpg')}}" class="img-responsive" alt="speakers">
                            <div class="speakers-thumb">
                                <h3>Professor Luo</h3>
                                <h6>Teacher</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
                        <div class="speakers-wrapper">
                            <img src="{{url('images/speakers-img2.jpg')}}" class="img-responsive" alt="speakers">
                            <div class="speakers-thumb">
                                <h3>PEI-YU KUO</h3>
                                <h6>Font-end Develper</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
                        <div class="speakers-wrapper">
                            <img src="{{url('images/speakers-img3.jpg')}}" class="img-responsive" alt="speakers">
                            <div class="speakers-thumb">
                                <h3>Je Mary Lee</h3>
                                <h6>Web Specialist</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
                        <div class="speakers-wrapper">
                            <img src="{{url('images/speakers-img4.jpg')}}" class="img-responsive" alt="speakers">
                            <div class="speakers-thumb">
                                <h3>Johnathan Doe</h3>
                                <h6>Frontend Dev</h6>
                            </div>
                        </div>
                    </div>

                    <div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
                        <div class="speakers-wrapper">
                            <img src="{{url('images/speakers-img5.jpg')}}" class="img-responsive" alt="speakers">
                            <div class="speakers-thumb">
                                <h3>Elite Hamilton</h3>
                                <h6>Marketing Guru</h6>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- =========================
        FAQ SECTION
    ============================== -->
    <section id="faq" class="parallax-section">
        <div class="container">
            <div class="row">

                <!-- Section title
                ================================================== -->
                <div class="wow bounceIn col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 text-center">
                    <div class="section-title">
                        <h2>Do you have Questions?</h2>
                        <p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
                    </div>
                </div>

                <div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="0.9s">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        What is the website for?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet, wisi risus
                                        purus augue vulputate voluptate neque, curabitur dolor libero sodales vitae elit
                                        massa. Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
                                    <p>Nunc eu nibh vel augue mollis tincidunt id efficitur tortor. Sed pulvinar est sit
                                        amet tellus iaculis hendrerit. Mauris justo erat, rhoncus in arcu at,
                                        scelerisque tempor erat.</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Will I be charged?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <p>Nunc eu nibh vel augue mollis tincidunt id efficitur tortor. Sed pulvinar est sit
                                        amet tellus iaculis hendrerit. Mauris justo erat, rhoncus in arcu at,
                                        scelerisque tempor erat.</p>
                                    <p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet, wisi risus
                                        purus augue vulputate voluptate neque, curabitur dolor libero sodales vitae elit
                                        massa. Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        What kind of sports in Sport2gether?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <p>Aenean vulputate finibus justo et feugiat. Ut turpis lacus, dapibus quis justo
                                        id, porttitor tempor justo. Quisque ut libero sapien. Integer tellus nisl,
                                        efficitur sed dolor at, vehicula finibus massa.</p>
                                    <p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet, wisi risus
                                        purus augue vulputate voluptate neque, curabitur dolor libero sodales vitae elit
                                        massa. Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- =========================
        VENUE SECTION
    ============================== -->
    <section id="venue" class="parallax-section">
        <div class="container">
            <div class="row">

                <div class="wow fadeInLeft col-md-offset-1 col-md-5 col-sm-8" data-wow-delay="0.9s">
                    <h2>Contact</h2>
                    <h4>Sport2gether co.</h4>
                    <h4>No.43, Keelung Rd., Sec.4, Da'an Dist.</h4>
                    <h4>Taipei City, Taiwan</h4>
                    <h4>Tel: 886-2-2733-3141</h4>
                </div>

            </div>
        </div>
    </section>

@stop

@section('scripts')
@stop