@extends('layouts.app')

@section('title', 'Welcome to Clinics - Your Health is Our Priority')

@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider dots-creative" data-height-xs="360">
        <!-- Slide 2 -->
        <div class="slide kenburns" style="background-image:url('{{ asset('storage/'.$getMenu->bg_image_thumb) }}');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <h1>Xəbərlər</h1>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 2 -->

    </div>
    <!--end: Inspiro Slider -->
    <!-- Content -->
    <section id="page-content">
        <div class="container">
            <!-- post content -->
            <!-- Page title -->
            <div class="page-title">
                <h1>Blog Masonry - Wide</h1>
                <div class="breadcrumb float-left">
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">Blog</a>
                        </li>
                        <li class="active"><a href="#">Wide</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end: Page title -->
            <!-- Blog -->
            <!-- Blog -->
            <div id="blog" class="grid-layout post-4-columns m-b-30" data-item="post-item">
                @foreach($blogs as $blog)
                    <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="{{ route('blog', ['id' => $blog->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">
                                    <img alt="{{ $blog->title }}" src="{{ asset('storage/'.$blog->thumb_image) }}">
                                </a>
                                <span class="post-meta-category"><a href="javascript:void(0);">{{ $blog->category->name }}</a></span>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ $blog->created_at->translatedFormat('j F, Y') }}</span>
                                <h2><a href="{{ route('blog', ['id' => $blog->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ $blog->title }}
                                    </a></h2>
                                <p>{{ substr_($blog->short_description,0,200,true,true) }}</p>
                                <a href="#" class="item-link">Ətraflı oxu <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end: Blog -->
            <!-- Pagination -->
            {{ $blogs->links('components.pagination.custom') }}
            <!-- end: Pagination -->
        </div>
        <!-- end: post content -->
    </section>
    <!-- end: Content -->
@endsection

@push('styles')
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            padding: 0;
            list-style: none;
            width: fit-content;
            margin: 0 auto;
        }
    </style>
@endpush