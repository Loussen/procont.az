@extends('layouts.app')

@section('title', 'Məhsullar')

@section('content')
    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider dots-creative" data-height-xs="360">
        <!-- Slide 2 -->
        <div class="slide kenburns" style="background-image:url('{{ asset('storage/'.$getMenu->bg_image_thumb) }}');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <h1>Məhsullar</h1>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 2 -->

    </div>
    <!--end: Inspiro Slider -->

    <!-- Page Menu -->
    <div class="page-menu menu-rounded">
        <div class="container">
            <!-- Portfolio Filter -->
            <nav class="no-margin" data-layout="#portfolio" id="portfolio">
                <ul>
                    <li class="{{ $categoryId == null || $categoryId == 0 ? 'active' : '' }}"><a href="{{ route('products', ['locale' => app()->getLocale()]) . '#portfolio' }}" data-category="*">Hamısını gör</a></li>
                    @foreach($categories as $category)
                        <li class="{{ $categoryId > 0 && $categoryId == $category->id ? 'active' : '' }}"><a href="{{ route('products', ['locale' => app()->getLocale(), 'category_id' => $category->id]) . '#portfolio' }}" data-category=".ct-{{ mb_strtolower($category->name,'UTF-8') }}">{{ $category->name }}</a></li>
                    @endforeach
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
            @foreach($products as $product)
                <!-- portfolio item -->
                <div class="portfolio-item img-zoom ct-{{ mb_strtolower($product->category->name ?? '','UTF-8') }}">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="{{ route('product', ['slug' => $product->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}"><img src="{{ asset('storage/'.$product->thumb_image) }}" alt="{{ $product->name }}"></a>
                        </div>
                        <div class="portfolio-description">
                            <a href="{{ route('product', ['slug' => $product->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">
                                <h3>{{ $product->name }}</h3>
                                <span>{{ $product->category->name ?? '' }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end: portfolio item -->
            @endforeach
        </div>
        <!-- end: Portfolio -->
    </section>
    <!-- end: Content -->
@endsection