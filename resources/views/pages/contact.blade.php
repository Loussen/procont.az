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
                    <h1>Bizimlə əlaqə</h1>
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
                <div class="col-lg-6">
                    <h3 class="text-uppercase">Get In Touch</h3>
                    <p>The most happiest time of the day!. Suspendisse condimentum porttitor cursus. Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisl malesuada vel. Aenean malesuada fermentum bibendum.</p>
                    <div class="m-t-30">
                        <form class="widget-contact-form" data-success-message-delay="40000" novalidate action="include/contact-form.php" role="form" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" aria-required="true" name="widget-contact-form-name" required class="form-control required name" placeholder="Enter your Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" aria-required="true" name="widget-contact-form-email" required class="form-control required email" placeholder="Enter your Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="subject">Your Subject</label>
                                    <input type="text" name="widget-contact-form-subject" required class="form-control required" placeholder="Subject...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea type="text" name="widget-contact-form-message" required rows="5" class="form-control required" placeholder="Enter your Message"></textarea>
                            </div>
                            <button class="btn btn-primary" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="text-uppercase">Address & Map</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>
                                <strong>Ünvan:</strong>
                                <a target="_blank" href="https://maps.app.goo.gl/xX36pLkVS9sgY8g97"> {{ $siteSettings->address }}</a>
                                <br />
                                <strong>İş saatları:</strong>
                                {{ $siteSettings->work_hours }}
                            </address>
                        </div>
                        <div class="col-lg-6">
                            <address>
                                <strong>Telefon:</strong>
                                <a href="tel:{{ $siteSettings->phone }}"> {{ $siteSettings->phone }}</a><br>
                                <strong>Email:</strong>
                                <a href="email:{{ $siteSettings->email }}">{{ $siteSettings->email }}</a><br>
                            </address>
                        </div>
                    </div>
                    <!-- Google Map -->
                    <iframe style="border:0; width: 100%; height: 370px;" src="{{ $siteSettings->map }}" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!-- end: Google Map -->
                </div>
            </div>
        </div>
    </section>
@endsection

{{--@push('scripts')--}}
{{--    <script type="text/javascript" src="{{ asset('assets/js/gmap3.min.js') }}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('assets/js/map-styles.js"') }}></script>--}}
{{--@endpush--}}