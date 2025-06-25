@extends('layouts.app')

@section('title', 'Welcome to Clinics - Your Health is Our Priority')

@section('content')
    <!-- Page title -->
    <section id="page-title" data-bg-parallax="{{ asset('assets/images/slider_1.jpg') }}">
        <div class="container">
            <div class="page-title">
                <h1>Contact Us</h1>
                <span>The most happiest time of the day!.</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">Home</a> </li>
                    <li><a href="#">Pages</a> </li>
                    <li class="active"><a href="#">Contact Us</a> </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end: Page title -->

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
                                {{ $siteSettings->address }}
                                <br />
                                <strong>İş saatları:</strong>
                                {{ $siteSettings->work_hours }}
                            </address>
                        </div>
                        <div class="col-lg-6">
                            <address>
                                <strong>Telefon:</strong>
                                {{ $siteSettings->phone }}<br>
                                <strong>Email:</strong>
                                {{ $siteSettings->email }}<br>
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