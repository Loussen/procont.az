@extends('layouts.app')

@section('title', 'Welcome to Clinics - Your Health is Our Priority')

@section('content')
    <!-- Page title -->
    <section id="page-title" class="background-image" style="background-image:url({{ asset('assets/images/slider_2.jpg') }});">
        <div class="container">
            <div class="page-title">
                <div data-animate="fadeIn" class="text-light">
                    <h1>Guide to the World</h1>
                </div>
                <div class="portfolio-attributes style1 text-light">
                    <div class="attribute" data-animate="fadeInUp" data-animate-delay="1000"><strong>Client:</strong> Woody Furniture</div>
                    <div class="attribute" data-animate="fadeInUp" data-animate-delay="1200"><strong>Date:</strong> 2017-07-10</div>
                    <div class="attribute" data-animate="fadeInUp" data-animate-delay="1400"><strong>Services:</strong> Web Design </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <!-- Content -->
    <section id="page-content" class="p-b-0">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="carousel carousel-promotion m-b-40" data-items="1" data-margin="40" data-loop="true" data-autoplay="true">
                                <div class="portfolio-item img-zoom">
                                    <div class="portfolio-item-wrap">
                                        <div class="portfolio-image">
                                            <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="portfolio-description">
                                            <a title="Paper Pouch!" data-lightbox="image" href="{{ asset('assets/images/slider_2.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-item img-zoom">
                                    <div class="portfolio-item-wrap">
                                        <div class="portfolio-image">
                                            <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="portfolio-description">
                                            <a title="Paper Pouch!" data-lightbox="image" href="{{ asset('assets/images/slider_2.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="portfolio-item img-zoom">
                                    <div class="portfolio-item-wrap">
                                        <div class="portfolio-image">
                                            <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="portfolio-description">
                                            <a title="Paper Pouch!" data-lightbox="image" href="{{ asset('assets/images/slider_2.jpg') }}" class="btn btn-light btn-roundeded">Zoom</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="project-description text-center">
                                <h2>Project Info</h2>
                                <p>Guide to the World has the guts to design and develop the impossible. With passion and a lot of expertise we create a surprisingly timeless collection of beautiful functional furniture, made with innovative and sustainable
                                    materials. Our brand represents connection.</p>
                                <div class="portfolio-share" data-animate="fadeIn">
                                    <h4>Share this project</h4>
                                    <div class="align-center">
                                        <a class="btn btn-slide btn-light" href="#">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>Facebook</span>
                                        </a>
                                        <a class="btn btn-slide btn-light" href="#" data-width="120">
                                            <i class="fab fa-twitter"></i>
                                            <span>Twitter</span>
                                        </a>
                                        <a class="btn btn-slide btn-light" href="#" data-width="140">
                                            <i class="fab fa-instagram"></i>
                                            <span>Instagram</span>
                                        </a>
                                        <a class="btn btn-slide btn-light" href="mailto:#" data-width="96">
                                            <i class="icon-mail"></i>
                                            <span>Mail</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-navigation">
                <a href="portfolio-page-background-video.html" class="post-prev">
                    <div class="post-prev-title"><span>Previous Post</span>Woody Chair vel accumsan</div>
                </a>
                <a href="portfolio-masonry-3.html" class="post-all">
                    <i class="icon-grid"> </i>
                </a>
                <a href="portfolio-page-particles.html" class="post-next">
                    <div class="post-next-title"><span>Next Post</span>Guide To The World</div>
                </a>
            </div>
        </div>
    </section>
    <!-- end: Content -->
@endsection