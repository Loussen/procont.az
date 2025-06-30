<footer id="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  col-lg-2 col-md-4">
                    <!-- Footer widget area 1 -->
                    <div class="widget  widget-contact-us" style="background-image: url({{ asset('assets/images/world-map-dark.png') }}); background-position: 50% 20px; background-repeat: no-repeat">
                        <h4>Şİrkətlə əlaqə</h4>
                        <ul class="list-icon">
                            <li><i class="fa fa-map-marker-alt"></i> <b>Ünvan:</b> <a target="_blank" href="https://maps.app.goo.gl/xX36pLkVS9sgY8g97">{{ $siteSettings->address }}</a></li>
                            <li><i class="fa fa-phone"></i> <b>Telefon:</b> <a href="tel:{{ $siteSettings->phone }}">{{ $siteSettings->phone }}</a> </li>
                            <li><i class="far fa-envelope"></i> <b>Email:</b> <a href="mailto:{{ $siteSettings->email }}">{{ $siteSettings->email }}</a> </li>
                            <li> <br>
                                <i class="far fa-clock"></i> <b>İş saatları:</b> {{ $siteSettings->work_hours }} </li>
                        </ul>
                    </div>
                    <!-- end: Footer widget area 1 -->
                </div>

                <div class="col-xl-2 col-lg-2 col-md-4">
                    <!-- Footer widget area 1 -->
                    <div class="widget">
                        <h4>Məhsullar</h4>
                        @php
                            $categories = \App\Models\Category::where('type','product')->limit(5)->get();
                            $totalCount = \App\Models\Category::where('type','product')->count();
                        @endphp
                        <ul class="list">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('products', ['category_id' => $category->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach

                            @if($totalCount > 5)
                                <li>
                                    <a href="{{ route('products') }}">
                                        <strong>Bütün məhsullar</strong>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <!-- end: Footer widget area 1 -->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4">
                    <!-- Footer widget area 2 -->
                    <div class="widget">
                        <h4>Menyular</h4>
                        <ul class="list">
                            @foreach (\App\Models\MenuItem::getTree() as $item)
                                <li>
                                    @php
                                        if($item->type == 'internal_link') {
                                            $link = route($item->link, ['locale' => \Illuminate\Support\Facades\App::getLocale()]);
                                        } elseif($item->type == 'page_link') {
                                            $link = route('page',['slug' => $item->page->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]);
                                        } else {
                                            $link = $item->link;
                                        }
                                    @endphp
                                    <a href="{{ $link }}">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end: Footer widget area 2 -->
                </div>


                @if(Route::currentRouteName() != 'contact')
                    <div class="col-lg-4">
{{--                    <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">--}}
{{--                        <div class="input-group mb-2">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>--}}
{{--                            </div>--}}
{{--                            <input type="text" aria-required="true" name="widget-contact-form-name" class="form-control required name" placeholder="Enter your Name">--}}
{{--                        </div>--}}
{{--                        <div class="input-group mb-2">--}}
{{--                            <div class="input-group-prepend">--}}
{{--                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>--}}
{{--                            </div>--}}
{{--                            <input type="email" aria-required="true" required name="widget-contact-form-email" class="form-control required email" placeholder="Enter your Email">--}}
{{--                        </div>--}}
{{--                        <div class="form-group mb-2">--}}
{{--                            <textarea type="text" name="widget-contact-form-message" rows="5" class="form-control required" placeholder="Enter your Message"></textarea>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <button class="btn btn-primary" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}

                        <iframe style="border:0; width: 100%; height: 250px;" src="{{ $siteSettings->map }}" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="container">

            <div class="row">
                <div class="col-lg-4">
                    <!-- Social icons -->
                    <div class="social-icons social-icons-colored float-left">
                        <ul>
                            @foreach($siteSettings->social_profiles as $socialProfile)
                                <li class="social-{{ $socialProfile['social_network'] }}"><a href="{{ $socialProfile['link'] }}" target="_blank"><i class="fab fa-{{ $socialProfile['social_network'] }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- end: Social icons -->
                </div>

                <div class="col-lg-4">
                    <div class="copyright-text text-center"><u><a href="https://rast.group/" target="_blank">Metatron</a></u> tərəfindən hazırlanmışdır</div>
                </div>

                <div class="col-lg-4">
                    <div class="copyright-text text-end">&copy; {{ date('Y') }} Skyglass. Bütün hüquqları qorunur.</div>
                </div>
            </div>
        </div>
    </div>
</footer>