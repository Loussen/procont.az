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
                @php
                    $gallery = $siteSettings->gallery;
                @endphp
                @foreach($gallery as $galleryItem)
                    @php
                        $info = pathinfo($galleryItem);
                        $thumbPath = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
                    @endphp
                    <div class="grid-item">
                        <a class="image-hover-zoom" href="{{ Storage::disk('site_gallery')->url($galleryItem) }}" data-lightbox="gallery-image"><img src="{{ Storage::disk('site_gallery')->url($thumbPath) }}"></a>
                    </div>
                @endforeach
            </div>
            <!-- end: Gallery -->
        </div>
    </section> <!-- end: Content -->
    <!-- end: Content -->
@endsection