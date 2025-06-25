@extends('layouts.app')

@section('title', 'Welcome to Clinics - Your Health is Our Priority')

@section('content')
    <!-- Page title -->
    <section id="page-title" class="background-image" style="background-image:url({{ asset('assets/images/slider_1.jpg') }});">
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
                            <div class="m-b-40" data-items="1" data-margin="40">
                                <div class="portfolio-item">
                                    <div class="portfolio-item-wrap">
                                        <div class="portfolio-image">
                                            <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="project-description text-center">
                                <h2>{{ $blog->title }}</h2>
                                <p>{!! $blog->description !!}</p>
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
                @if($prevBlog)
                    <a href="{{ route('blog', ['id' => $prevBlog->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="post-prev">
                        <div class="post-prev-title">
                            <span>Əvvəlki Xəbər</span>
                            {{ $prevBlog->title }}
                        </div>
                    </a>
                @endif
                <a href="{{ route('blogs') }}" class="post-all">
                    <i class="icon-grid"> </i>
                </a>
                @if($nextBlog)
                    <a href="{{ route('blog', ['id' => $nextBlog->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="post-next">
                        <div class="post-next-title">
                            <span>Növbəti Xəbər</span>
                            {{ $nextBlog->title }}
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </section>
    <!-- end: Content -->
@endsection