@extends('layouts.app')

@section('title', 'Xəbərlər - '.$blog->title)

@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider dots-creative" data-height-xs="360">
        <!-- Slide 2 -->
        <div class="slide kenburns" style="background-image:url('{{ asset('storage/'.$getMenu->bg_image_thumb) }}');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <h1>{{ $blog->title }}</h1>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 2 -->

    </div>
    <!--end: Inspiro Slider -->
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
                                        @php
                                            $url = urlencode(request()->fullUrl());
                                            $title = urlencode($blog->title);
                                        @endphp
                                        <a class="btn btn-slide btn-light"
                                           href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}"
                                           target="_blank" rel="noopener">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>Facebook</span>
                                        </a>

                                        <a class="btn btn-slide btn-light"
                                           href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $title }}"
                                           target="_blank" rel="noopener">
                                            <i class="fab fa-twitter"></i>
                                            <span>Twitter</span>
                                        </a>

                                        <a class="btn btn-slide btn-light"
                                           href="https://www.instagram.com/?url={{ $url }}"
                                           target="_blank" rel="noopener">
                                            <i class="fab fa-instagram"></i>
                                            <span>Instagram</span>
                                        </a>

                                        <a class="btn btn-slide btn-light"
                                           href="mailto:?subject={{ $title }}&body=Link: {{ $url }}">
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
                    <a href="{{ route('blog', ['slug' => $prevBlog->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="post-prev">
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
                    <a href="{{ route('blog', ['slug' => $nextBlog->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="post-next">
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