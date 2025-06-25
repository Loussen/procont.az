@extends('layouts.app')

@section('title', 'Welcome to Clinics - Your Health is Our Priority')

@section('content')

    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="360">
        @foreach($sliders as $slider)
            <!-- Slide 1 -->
            <div class="slide kenburns" data-bg-image="{{ asset("storage/".$slider->image) }}">
                <div class="bg-overlay"></div>
                <div class="container">
                    <div class="slide-captions text-center">
                        <!-- Captions -->
                        <h1 class="text-light">{{ $slider->title }}</h1>
                        <h4 class="m-b-20 text-light">{{ $slider->description }}</h4>
                        <div><a href="{{ $slider->url }}" target="_blank" class="btn btn-danger">Daha ətraflı</a></div>
                        <!-- end: Captions -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!--end: Inspiro Slider -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="heading-text heading-section">
                        <h2>Şirkət haqqında</h2>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">{!! $aboutUs->content ?? '' !!}</div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="no-padding">
        <div class="portfolio">
            <!-- Portfolio Items -->
            <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0">

                @foreach($products as $product)
                    <!-- portfolio item -->
                    <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="{{ route('product', ['id' => $product->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}"><img src="{{ asset("storage/".$product->thumb_image) }}" alt=""></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="{{ route('product', ['id' => $product->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">
                                    <h3>{{ $product->name }}</h3>
                                    <span>{{ $product->category->name }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end: portfolio item -->
                @endforeach
            </div>
            <!-- end: Portfolio Items -->
        </div>
    </section>

    <section class="background-grey p-t-100">
        <div class="container xs-text-center sm-text-center">
            <div class="row">
                @php $numbers = json_decode($siteSettings->numbers,true); @endphp
                @foreach($numbers as $number)
                    <div class="col-lg-3">
                        <div class="text-center">
                            <div class="counter text-lg"> <span data-speed="3000" data-refresh-interval="50" data-to="{{ $number['number'] }}" data-from="0" data-seperator="true"></span> </div>
                            <div class="seperator seperator-small"></div>
                            <p>{{ $number['title'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="box-fancy section-fullwidth text-light p-b-0 p-t-0">
        <div class="row">
            @php $services = json_decode($siteSettings->services,true); @endphp
            @php
                $colors = [
                    'rgb(241, 183, 50)',
                    'rgb(252, 196, 63)',
                    'rgb(253, 206, 73)',
                ];
            @endphp

            @foreach($services as $index => $service)
                @php
                    $color = $colors[$index % count($colors)];
                    $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                @endphp

                <div style="background-color: {{ $color }};" class="col-lg-4">
                    <h1 class="text-lg text-uppercase">{{ $number }}.</h1>
                    <h3>{{ $service['title'] }}</h3>
                    <span>{{ $service['description'] }}</span>
                </div>
            @endforeach

        </div>
    </section>

    <section class="text-center">
        <div class="container">
            <div class="carousel client-logos" data-items="6" data-items-sm="4" data-items-xs="3" data-items-xxs="2" data-margin="20" data-arrows="false" data-autoplay="true" data-autoplay="3000" data-loop="true">
                @foreach($clients as $client)
                    <div>
                        <a href="{{ $client->link }}" target="_blank"><img alt="{{ $client->name ?? '' }}" src="{{ asset('storage/'.$client->thumb_image) }}"> </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="section-gallery" class="no-padding" style="background-color:#454A43;">

        <!-- Portfolio -->
        <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0" data-lightbox="gallery">
            @php
                $gallery = $siteSettings->gallery;
            @endphp
            @foreach($gallery as $galleryItem)
                @php
                    $info = pathinfo($galleryItem);
                    $thumbPath = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
                @endphp

                <div class="portfolio-item img-zoom">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="{{ Storage::disk('site_gallery')->url($galleryItem) }}">
                                <img src="{{ Storage::disk('site_gallery')->url($thumbPath) }}" alt="">
                            </a>
                        </div>
                        <div class="portfolio-description">
                            <a title="Zoom Image" data-lightbox="gallery-image" href="{{ Storage::disk('site_gallery')->url($galleryItem) }}" class="btn btn-light btn-rounded">Zoom</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- end: Portfolio -->

        <!-- Load next portfolio items -->
        <div id="pagination" class="infinite-scroll">
            <a href="{{ route('photo-gallery') }}"></a>
        </div>
        <!-- end:Load next portfolio items -->

    </section>

    <section id="section4">
        <div class="container">
            <div class="heading-text heading-section text-center m-b-40">
                <h2 class="m-b-0">XƏBƏRLƏR</h2>
                <span class="lead">Bizim xəbərlərimizi buradan izləyin!</span>
            </div>
            <div id="blog">

                <!-- Blog post-->
                <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">

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

                                    <a href="{{ route('blog', ['id' => $blog->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="item-link">Ətraflı oxu <i class="fa fa-arrow-right"></i></a>

                                </div>
                            </div>
                        </div>
                        <!-- end: Post item-->
                    @endforeach
                </div>
                <!-- end: Blog post-->
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/infinite-scroll.min.js') }}"></script>
@endpush