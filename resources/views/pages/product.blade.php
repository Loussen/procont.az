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
                    <h1>{{ $product->name }}</h1>
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
                            <div class="carousel carousel-promotion m-b-40" data-items="1" data-margin="40" data-loop="true" data-autoplay="true">
                                @php
                                    $gallery = json_decode($product->gallery, true) ?? [];
                                    array_unshift($gallery, $product->image);
                                @endphp
                                @foreach($gallery as $galleryItem)
                                    <div class="portfolio-item img-zoom">
                                        <div class="portfolio-item-wrap">
                                            <div class="portfolio-image">
                                                <a href="#"><img src="{{ $loop->index == 0 ? asset('storage/'.$galleryItem) : Storage::disk('products_gallery')->url($galleryItem) }}" alt="{{ $product->name }}"></a>
                                            </div>
                                            <div class="portfolio-description">
                                                <a title="Paper Pouch!" data-lightbox="image" href="{{ $loop->index == 0 ? asset('storage/'.$galleryItem) : Storage::disk('products_gallery')->url($galleryItem) }}" class="btn btn-light btn-roundeded">Zoom</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="project-description text-center">
                                <h2>{{ $product->name }}</h2>
                                <p>{!! $product->description !!}</p>
                                <div class="portfolio-share">
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
                @if($prevProduct)
                    <a href="{{ route('product', ['slug' => $prevProduct->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="post-prev">
                        <div class="post-prev-title">
                            <span>Əvvəlki Məhsul</span>
                            {{ $prevProduct->name }}
                        </div>
                    </a>
                @endif
                <a href="{{ route('products') }}" class="post-all">
                    <i class="icon-grid"> </i>
                </a>
                @if($nextProduct)
                    <a href="{{ route('product', ['slug' => $nextProduct->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="post-next">
                        <div class="post-next-title">
                            <span>Növbəti Məhsul</span>
                            {{ $nextProduct->name }}
                        </div>
                    </a>
                @endif
            </div>
        </div>
    </section>
    <!-- end: Content -->
@endsection