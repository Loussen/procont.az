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
                    @foreach($categories as $category)
                        <li><a href="#" data-category=".ct-{{ mb_strtolower($category->name,'UTF-8') }}">{{ $category->name }}</a></li>
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
                <div class="portfolio-item img-zoom ct-{{ mb_strtolower($product->category->name,'UTF-8') }}">
                    <div class="portfolio-item-wrap">
                        <div class="portfolio-image">
                            <a href="{{ route('product', ['id' => $product->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}"><img src="{{ asset('storage/'.$product->thumb_image) }}" alt="{{ $product->name }}"></a>
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
        <!-- end: Portfolio -->
    </section>
    <!-- end: Content -->
@endsection