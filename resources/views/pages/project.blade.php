@extends('layouts.app')

@section('title', 'Layihələr - '.$project->title)

@section('content')
    <!-- Page Content -->
    <section id="page-content" class="sidebar-right">
        <div class="container">
            <div class="row">
                <!-- content -->
                <div class="content col-lg-12">
                    <!-- Blog -->
                    <div id="blog" class="single-post">
                        <!-- Post single item-->
                        <div class="post-item">
                            <div class="post-item-wrap">
                                <div class="carousel dots-inside arrows-visible" data-items="1" data-lightbox="gallery">
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
                                <div class="post-item-description">
                                    <h2>Standard post with a single image</h2>
                                    <div class="post-meta">
                                        <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ $project->created_at->translatedFormat('j F, Y') }}</span>
                                        @php
                                            $url = urlencode(request()->fullUrl());
                                            $title = urlencode($project->name);
                                        @endphp
                                        <div class="post-meta-share">
                                            <a class="btn btn-xs btn-slide btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}">
                                                <i class="fab fa-facebook-f"></i>
                                                <span>Facebook</span>
                                            </a>
                                            <a class="btn btn-xs btn-slide btn-twitter" target="_blank" href="https://twitter.com/intent/tweet?url={{ $url }}&text={{ $title }}" data-width="100">
                                                <i class="fab fa-twitter"></i>
                                                <span>Twitter</span>
                                            </a>
                                            <a class="btn btn-xs btn-slide btn-instagram" target="_blank" href="https://www.instagram.com/?url={{ $url }}" data-width="118">
                                                <i class="fab fa-instagram"></i>
                                                <span>Instagram</span>
                                            </a>
                                            <a class="btn btn-xs btn-slide btn-googleplus" target="_blank" href="mailto:?subject={{ $title }}&body=Link: {{ $url }}" data-width="80">
                                                <i class="icon-mail"></i>
                                                <span>Mail</span>
                                            </a>
                                        </div>
                                    </div>
                                    <p>{!! $project->description !!}</p>
                                </div>
                                <div class="post-navigation">
                                    @if($prevProject)
                                        <a href="{{ route('project', ['slug' => $prevProject->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="post-prev">
                                            <div class="post-prev-title">
                                                <span>Əvvəlki Layihə</span>
                                                {{ $prevProject->name }}
                                            </div>
                                        </a>
                                    @endif
                                        <a href="{{ route('projects') }}" class="post-all">
                                            <i class="icon-grid"> </i>
                                        </a>
                                    @if($nextProject)
                                        <a href="{{ route('project', ['slug' => $nextProject->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}" class="post-next">
                                            <div class="post-next-title">
                                                <span>Növbəti Layihə</span>
                                                {{ $nextProject->name }}
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end: Post single item-->
                    </div>
                </div>
                <!-- end: content -->
            </div>
        </div>
    </section>
    <!-- end: Page Content -->
@endsection