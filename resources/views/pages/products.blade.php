@extends('layouts.app')

@section('title', 'Welcome to Clinics - Your Health is Our Priority')

@section('content')
    <!-- Page Menu -->
    <div class="page-menu menu-rounded">
        <div class="container">
            <!-- Portfolio Filter -->
            <nav class="grid-filter no-margin" data-layout="#portfolio">
                <ul>
                    <li class="active"><a href="#" data-category="*">Show All</a></li>
                    <li><a href="#" data-category=".ct-branding">Branding</a></li>
                    <li><a href="#" data-category=".ct-photography">Photography</a></li>
                    <li><a href="#" data-category=".ct-marketing">Marketing</a></li>
                    <li><a href="#" data-category=".ct-media">Media</a></li>
                    <li><a href="#" data-category=".ct-webdesign">Web design</a></li>
                </ul>
            </nav>
            <!-- end: Portfolio Filter -->
        </div>
    </div>
    <!-- end: Page Menu -->
    <!-- Content -->
    <section id="page-content" class="no-padding">
        <!-- Portfolio -->
        <div id="portfolio" class="grid-layout no-margin no-padding portfolio-3-columns" data-margin="0">
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a href="portfolio-page-grid-gallery.html">
                            <h3>Last Iceland Sunshine</h3>
                            <span>Graphics</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a href="portfolio-page-grid-gallery.html">
                            <h3>Last Iceland Sunshine</h3>
                            <span>Graphics</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a href="portfolio-page-grid-gallery.html">
                            <h3>Last Iceland Sunshine</h3>
                            <span>Graphics</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a href="portfolio-page-grid-gallery.html">
                            <h3>Last Iceland Sunshine</h3>
                            <span>Graphics</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a href="portfolio-page-grid-gallery.html">
                            <h3>Last Iceland Sunshine</h3>
                            <span>Graphics</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a href="portfolio-page-grid-gallery.html">
                            <h3>Last Iceland Sunshine</h3>
                            <span>Graphics</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
            <!-- portfolio item -->
            <div class="portfolio-item img-zoom ct-marketing ct-media ct-branding ct-marketing ct-webdesign">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="#"><img src="{{ asset('assets/images/slider_2.jpg') }}" alt=""></a>
                    </div>
                    <div class="portfolio-description">
                        <a href="portfolio-page-grid-gallery.html">
                            <h3>Last Iceland Sunshine</h3>
                            <span>Graphics</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end: portfolio item -->
        </div>
        <!-- end: Portfolio -->
    </section>
    <!-- end: Content -->
@endsection