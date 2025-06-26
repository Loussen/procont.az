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
                    <h1>Şirkət haqqında</h1>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>
        <!-- end: Slide 2 -->

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
                        <div class="col-lg-12">{!! $page->content !!}</div>

                    </div>
                </div>

            </div>
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
@endsection