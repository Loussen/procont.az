@extends('layouts.app')

@section('title', 'Welcome to Clinics - Your Health is Our Priority')

@section('content')

    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="360">
        <!-- Slide 1 -->
        <div class="slide kenburns" data-bg-image="{{ asset('assets/images/slider_1.jpg') }}">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center">
                    <!-- Captions -->
                    <h1 class="text-light">Pixel Perfection</h1>
                    <h4 class="m-b-20 text-light">Set your goals high, and don't stop till you get there.</h4>
                    <div><a href="#" class="btn btn-danger">Explore more</a></div>
                    <!-- end: Captions -->
                </div>

            </div>
        </div>
        <!-- end: Slide 1 bu-->
        <!-- Slide 2 -->
        <div class="slide slide-dark kenburns" data-bg-image="{{ asset('assets/images/slider_2.jpg') }}">
            <div class="bg-overlay" data-style="1"></div>
            <div class="container">
                <div class="slide-captions text-dark text-center">
                    <!-- Captions -->
                    <h1>The World of POLO</h1>
                    <h4 class="m-b-20">Set your goals high, and don't stop till you get there.</h4>
                    <div><a href="#" class="btn btn-danger">Explore more</a></div>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 2 -->
    </div>
    <!--end: Inspiro Slider -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="heading-text heading-section">
                        <h2>THE COMPANY</h2>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. A true story, that never
                            been told!. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat, <br> <br> facilisis ut venenatis eu, sodales vel dolor. The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida
                            tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. A true story, that never been told!. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis
                            eu, sodales vel dolor. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor. The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius
                            consequat magna, id molestie ipsum volutpat quis. A true story, that never been told!. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat, facilisis ut venenatis eu, sodales vel dolor. Pellentesque ipsum erat, facilisis
                            ut venenatis eu, sodales vel dolor. <br> <br>The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie
                            ipsum volut.</div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="no-padding">
        <div class="portfolio">
            <!-- Portfolio Items -->
            <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0">

                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->

                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->

                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->

                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->

                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->

                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->

                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->

                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="portfolio-page-grid-gallery.html">
                                <h3>Let's Go Outside</h3>
                                <span>Illustrations / Graphics</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
            </div>
            <!-- end: Portfolio Items -->

        </div>
    </section>

    <section class="background-grey p-t-100">
        <div class="container xs-text-center sm-text-center">
            <div class="row">
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="counter text-lg"> <span data-speed="3000" data-refresh-interval="50" data-to="12416" data-from="600" data-seperator="true"></span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>LINES OF CODE</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="counter text-lg"> <span data-speed="4500" data-refresh-interval="23" data-to="365" data-from="100" data-seperator="true"></span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>CUPS OF COFFEE</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="counter text-lg"> <span data-speed="3000" data-refresh-interval="12" data-to="114" data-from="50" data-seperator="true"></span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>FINISHED PROJECTS</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="text-center">
                        <div class="counter text-lg"> <span data-speed="4550" data-refresh-interval="50" data-to="14825" data-from="48" data-seperator="true"></span> </div>
                        <div class="seperator seperator-small"></div>
                        <p>SATISFIED CLIENTS</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="box-fancy section-fullwidth text-light p-b-0 p-t-0">
        <div class="row">
            <div style="background-color: rgb(241, 183, 50);" class="col-lg-4">
                <h1 class="text-lg text-uppercase">01.</h1>
                <h3>CONCEPT</h3>
                <span>The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. A true story, that never been told!. </span>
            </div>

            <div style="background-color: rgb(252, 196, 63);" class="col-lg-4">
                <h1 class="text-lg text-uppercase">02.</h1>
                <h3>DEVELOPMENT</h3>
                <span>The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. A true story, that never been told!. </span>
            </div>

            <div style="background-color: rgb(253, 206, 73);" class="col-lg-4">
                <h1 class="text-lg text-uppercase">03.</h1>
                <h3>TESTING</h3>
                <span>The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. A true story, that never been told!. </span>
            </div>
        </div>
    </section>

    <section class="text-center">
        <div class="container">
            <div class="carousel client-logos" data-items="6" data-items-sm="4" data-items-xs="3" data-items-xxs="2" data-margin="20" data-arrows="false" data-autoplay="true" data-autoplay="3000" data-loop="true">
                <div>
                    <a href="#"><img alt="" src="{{ asset('assets/images/client.png') }}"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="{{ asset('assets/images/client.png') }}"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="{{ asset('assets/images/client.png') }}"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="{{ asset('assets/images/client.png') }}"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="{{ asset('assets/images/client.png') }}"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="{{ asset('assets/images/client.png') }}"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="{{ asset('assets/images/client.png') }}"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="{{ asset('assets/images/client.png') }}"> </a>
                </div>
                <div>
                    <a href="#"><img alt="" src="{{ asset('assets/images/client.png') }}"> </a>
                </div>
            </div>
        </div>
    </section>

    <section id="section-gallery" class="no-padding" style="background-color:#454A43;">

        <!-- Portfolio -->
        <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0" data-lightbox="gallery">
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a title="Paper Pouch!" data-lightbox="gallery-image" href="{{ asset('assets/images/portfolio.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a title="Paper Pouch!" data-lightbox="gallery-image" href="{{ asset('assets/images/portfolio.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a title="Paper Pouch!" data-lightbox="gallery-image" href="{{ asset('assets/images/portfolio.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a title="Paper Pouch!" data-lightbox="gallery-image" href="{{ asset('assets/images/portfolio.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a title="Paper Pouch!" data-lightbox="gallery-image" href="{{ asset('assets/images/portfolio.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a title="Paper Pouch!" data-lightbox="gallery-image" href="{{ asset('assets/images/portfolio.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/portfolio.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a title="Paper Pouch!" data-lightbox="gallery-image" href="{{ asset('assets/images/portfolio.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
        </div>
        <!-- end: Portfolio -->

        <!-- Load next portfolio items -->
        <div id="pagination" class="infinite-scroll">
            <a href="home-portfolio-v10-infinite-scroll-2.html"></a>
        </div>
        <!-- end:Load next portfolio items -->

    </section>

    <section id="section4">
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40">
                <h2 class="m-b-0">OUR BLOG</h2>
                <span class="lead">We do blogging sometimes!</span>
            </div>
            <div id="blog">

                <!-- Blog post-->
                <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">

                    <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="{{ asset('assets/images/slider_2.jpg') }}">
                                </a>
                                <span class="post-meta-category"><a href="">Lifestyle</a></span>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                                <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33 Comments</a></span>
                                <h2><a href="#">Standard post with a single image
                                    </a></h2>
                                <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>

                                <a href="#" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->

                    <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="{{ asset('assets/images/slider_2.jpg') }}">
                                </a>
                                <span class="post-meta-category"><a href="">Science</a></span>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                                <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33 Comments</a></span>

                                <h2><a href="#">Standard post with a single image
                                    </a></h2>
                                <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>

                                <a href="#" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->


                    <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src="{{ asset('assets/images/slider_2.jpg') }}">
                                </a>
                                <span class="post-meta-category"><a href="">Science</a></span>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                                <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33 Comments</a></span>

                                <h2><a href="#">Standard post with a single image
                                    </a></h2>
                                <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>

                                <a href="#" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                </div>
                <!-- end: Blog post-->
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/infinite-scroll.min.js') }}"></script>
@endpush