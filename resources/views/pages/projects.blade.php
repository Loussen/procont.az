@extends('layouts.app')

@section('title', 'Xəbərlər')

@section('content')
    <section id="page-content">
        <div class="container">
            <!-- post content -->
            <!-- Page title -->
            <div class="page-title">
                <h1 class="mb-5">Layihələrimiz</h1>
            </div>
            <!-- end: Page title -->
            <!-- Blog -->
            <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
                @foreach($projects as $project)
                    <!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-slider">
                                <div class="carousel dots-inside arrows-visible arrows-only" data-items="1" data-loop="true" data-autoplay="true" data-lightbox="gallery">
                                    @php
                                        $gallery = $project->gallery;
                                    @endphp
                                    @foreach($gallery as $galleryItem)
                                        @php
                                            $info = pathinfo($galleryItem);
                                            $thumbPath = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
                                        @endphp

                                        <a href="{{ Storage::disk('projects_gallery')->url($galleryItem) }}" data-lightbox="gallery-image">
                                            <img alt="{{ $project->name }}" src="{{ Storage::disk('projects_gallery')->url($thumbPath) }}">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="post-item-description">
                                <h2><a href="{{ route('project', ['slug' => $project->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ $project->name }}</a></h2>
                                <p>{{ substr_($project->short_description,0,200,true,true) }}</p>
                                <a href="{{ route('project', ['slug' => $project->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="item-link">Ətraflı oxu <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                @endforeach
            </div>
            <!-- end: Blog -->
            <!-- Pagination -->
            {{ $projects->links('components.pagination.custom') }}
            <!-- end: Pagination -->
        </div>
        <!-- end: post content -->
    </section>
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