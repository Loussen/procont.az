@extends('layouts.app')

@section('title', 'Əlaqə')

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
                        <form class="widget-contact-form" id="contactForm" data-success-message-delay="40000" novalidate role="form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="full_name">Ad, Soyad</label>
                                    <input type="text" aria-required="true" name="full_name" required class="form-control required full_name" placeholder="Ad və soyadınızı buraya yazın...">
                                    <div class="invalid-feedback" data-error="full_name"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" aria-required="true" name="email" required class="form-control required email" placeholder="Email adresinizi buraya yazın...">
                                    <div class="invalid-feedback" data-error="email"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="subject">Başlıq</label>
                                    <input type="text" name="subject" required class="form-control required" placeholder="Başlıq...">
                                    <div class="invalid-feedback" data-error="subject"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Mesaj</label>
                                <textarea type="text" name="message" required rows="5" class="form-control required" placeholder="Mesajınızı buraya yazın..."></textarea>
                                <div class="invalid-feedback" data-error="message"></div>
                            </div>
                            <div class="loading">Yüklənir</div>
                            <div class="alert alert-danger error-message d-none"></div>
                            <div class="alert alert-success sent-message">Sizin mesajınız uğurla göndərildi. Təşəkkür edirik!</div>
                            <button class="btn btn-primary" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Mesaj göndər</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="text-uppercase">Ünvan & Əlaqələr</h3>
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

@push('styles')
    <style>
        /* PHP Email Form Messages */
        .widget-contact-form .error-message {
            display: none;
            background: #df1529;
            color: #ffffff;
            text-align: left;
            padding: 15px;
            margin-bottom: 24px;
            font-weight: 600;
        }

        .widget-contact-form .sent-message {
            display: none;
            color: #ffffff;
            background: #059652;
            text-align: center;
            padding: 15px;
            margin-bottom: 24px;
            font-weight: 600;
        }

        .widget-contact-form .loading {
            display: none;
            background: #ffffff;
            text-align: center;
            padding: 15px;
            margin-bottom: 24px;
        }

        .widget-contact-form .loading:before {
            content: "";
            display: inline-block;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            margin: 0 10px -6px 0;
            border: 3px solid #3fbbc0;
            border-top-color: #3fbbc0;
            animation: php-email-form-loading 1s linear infinite;
        }

        @keyframes widget-contact-form-loading {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const loading = form.querySelector('.loading');
            const errorMessage = form.querySelector('.error-message');
            const sentMessage = form.querySelector('.sent-message');

            // Function to reset form state
            function resetFormState() {
                // Hide messages
                loading.style.display = 'block';
                errorMessage.style.display = 'none';
                errorMessage.innerHTML = '';
                sentMessage.style.display = 'none';

                // Reset validation errors
                const errorElements = form.querySelectorAll('.invalid-feedback');
                errorElements.forEach(el => {
                    el.style.display = 'none';
                    el.textContent = '';
                });

                // Reset input classes
                const inputs = form.querySelectorAll('.form-control');
                inputs.forEach(input => {
                    input.classList.remove('is-invalid');
                });
            }

            // Function to display validation errors
            function displayValidationErrors(errors) {
                Object.keys(errors).forEach(field => {
                    const errorElement = form.querySelector(`[data-error="${field}"]`);
                    const inputElement = form.querySelector(`[name="${field}"]`);

                    if (errorElement && inputElement) {
                        errorElement.textContent = errors[field][0];
                        errorElement.style.display = 'block';
                        inputElement.classList.add('is-invalid');
                    }
                });
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Reset form state
                resetFormState();

                // Get form data
                const formData = new FormData(form);

                // Send AJAX request
                fetch('{{ route('contactForm') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => {
                        loading.style.display = 'none';
                        return response.json().then(data => {
                            return {
                                ok: response.ok,
                                status: response.status,
                                data: data
                            };
                        });
                    })
                    .then(result => {
                        if (result.ok) {
                            sentMessage.style.display = 'block';
                            form.reset();
                        } else {
                            if (result.status === 422 && result.data.errors) {
                                // Display validation errors
                                displayValidationErrors(result.data.errors);
                                errorMessage.innerHTML = 'Please correct the errors below.';
                                errorMessage.style.display = 'block';
                            } else {
                                errorMessage.innerHTML = result.data.message || 'An error occurred while sending the message';
                                errorMessage.style.display = 'block';
                            }
                        }
                    })
                    .catch(error => {
                        loading.style.display = 'none';
                        errorMessage.innerHTML = 'An error occurred while sending the message';
                        errorMessage.style.display = 'block';
                        console.error('Error:', error);
                    });
            });
        });
    </script>
@endpush