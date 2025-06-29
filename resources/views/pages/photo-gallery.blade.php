@extends('layouts.app')

@section('title', 'Qalereya')

@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider dots-creative" data-height-xs="360">
        <!-- Slide 2 -->
        <div class="slide kenburns" style="background-image:url('{{ asset('storage/'.$getMenu->bg_image_thumb) }}');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <h1>Foto qalereya</h1>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 2 -->

    </div>
    <!--end: Inspiro Slider -->
    <!-- Content -->
    <section id="page-content">
        <div class="container-fluid">
            <!-- Gallery -->
            <div class="grid-layout grid-5-columns" data-margin="20" data-item="grid-item" data-lightbox="gallery">
                @php
                    $gallery = $gallery->images;
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