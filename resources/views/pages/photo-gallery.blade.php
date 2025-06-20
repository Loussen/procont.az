@extends('layouts.app')

@section('title', 'Welcome to Clinics - Your Health is Our Priority')

@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="{{ asset('assets/images/slider_1.jpg') }}">
        <div class="container">
            <div class="page-title">
                <h1>Gallery Wide</h1>
                <span>Description</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">Home</a>
                    </li>
                    <li><a href="#">Pages</a>
                    </li>
                    <li class="active"><a href="#">Gallery Wide</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <!-- Content -->
    <section id="page-content">
        <div class="container-fluid">
            <!-- Gallery -->
            <div class="grid-layout grid-5-columns" data-margin="20" data-item="grid-item" data-lightbox="gallery">
                <div class="grid-item">
                    <a class="image-hover-zoom" href="{{ asset('assets/images/gallery.jpg') }}" data-lightbox="gallery-image"><img src="{{ asset('assets/images/gallery.jpg') }}"></a>
                </div>
                <div class="grid-item">
                    <a class="image-hover-zoom" href="{{ asset('assets/images/gallery.jpg') }}" data-lightbox="gallery-image"><img src="{{ asset('assets/images/gallery.jpg') }}"></a>
                </div>
                <div class="grid-item">
                    <a class="image-hover-zoom" href="{{ asset('assets/images/gallery.jpg') }}" data-lightbox="gallery-image"><img src="{{ asset('assets/images/gallery.jpg') }}"></a>
                </div>
                <div class="grid-item">
                    <a class="image-hover-zoom" href="{{ asset('assets/images/gallery.jpg') }}" data-lightbox="gallery-image"><img src="{{ asset('assets/images/gallery.jpg') }}"></a>
                </div>
                <div class="grid-item">
                    <a class="image-hover-zoom" href="{{ asset('assets/images/gallery.jpg') }}" data-lightbox="gallery-image"><img src="{{ asset('assets/images/gallery.jpg') }}"></a>
                </div>
                <div class="grid-item">
                    <a class="image-hover-zoom" href="{{ asset('assets/images/gallery.jpg') }}" data-lightbox="gallery-image"><img src="{{ asset('assets/images/gallery.jpg') }}"></a>
                </div>
                <div class="grid-item">
                    <a class="image-hover-zoom" href="{{ asset('assets/images/gallery.jpg') }}" data-lightbox="gallery-image"><img src="{{ asset('assets/images/gallery.jpg') }}"></a>
                </div>
                <div class="grid-item">
                    <a class="image-hover-zoom" href="{{ asset('assets/images/gallery.jpg') }}" data-lightbox="gallery-image"><img src="{{ asset('assets/images/gallery.jpg') }}"></a>
                </div>
            </div>
            <!-- end: Gallery -->
        </div>
    </section>
    <!-- end: Content -->
@endsection