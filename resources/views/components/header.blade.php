<header id="header" data-transparent="true" class="{{ in_array(Route::currentRouteName(),['projects','project']) ? '' : 'dark' }}">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="{{ route('home') }}">
                    <span class="logo-default"><img src="{{ asset('assets/images/logo'.(in_array(Route::currentRouteName(),['projects','project']) ? '-dark' : '').'.png') }}" width="200"  alt="Skyglass"/></span>
                    <span class="logo-dark"><img src="{{ asset('assets/images/logo.png') }}" width="200"  alt=""/></span>
                </a>
            </div>
            <!--End: Logo-->
            <!-- Search -->
{{--            <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>--}}
{{--                <form class="search-form" action="search-results-page.html" method="get">--}}
{{--                    <input class="form-control" name="q" type="text" placeholder="Type & Search..." />--}}
{{--                    <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>--}}
{{--                </form>--}}
{{--            </div>--}}
            <!-- end: search -->
            <!--Header Extras-->
            <div class="header-extras">
                <ul>
{{--                    <li>--}}
{{--                        <a id="btn-search" href="#"> <i class="icon-search"></i></a>--}}
{{--                    </li>--}}
                    <li>
                        <div class="p-dropdown">
                            <a href="javascript:void(0);"><i class="icon-globe"></i><span>{{ app()->getLocale() }}</span></a>
                            <ul class="p-dropdown-content">
                                @foreach(config('data.locales') as $locale => $language)
                                    <li>
                                        @php
                                            $params = ['locale' => $locale];

                                            // Əgər route `page`-dirsə, `slug`-u əlavə edirik
                                            if (in_array(\Illuminate\Support\Facades\Route::currentRouteName(),['page','blog','product','project'])) {
                                                $params['slug'] = request()->route('slug');
                                            } else {
                                                $params['id'] = request()->route('id');
                                            }
                                        @endphp
                                        <a href="{{ route(Route::currentRouteName(), $params) }}">{{ $language }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <!--end: Header Extras-->
            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger"> <a class="lines-button x"><span class="lines"></span></a> </div>
            <!--end: Navigation Resposnive Trigger-->
            <!--Navigation-->
            <div id="mainMenu" class="menu-center">
                <div class="container">
                    <nav>
                        <ul>
                            @foreach (\App\Models\MenuItem::getTree() as $item)
                                <li class="{{ in_array($item->link,['products']) ? 'dropdown' : '' }}">
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
                                    @if($item->link == 'products')
                                        <ul class="dropdown-menu">
                                            @foreach(\App\Models\Category::where('type','product')->orderby('lft','ASC')->get() as $category)
                                                <li class="dropdown-submenu">
                                                    <a href="{{ route('products', ['category_id' => $category->id, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ $category->name }}</a>
                                                    <ul class="dropdown-menu">
                                                        @foreach($category->products->sortBy('lft') as $product)
                                                            <li>
                                                                <a href="{{ route('product', ['slug' => $product->slug, 'locale' => \Illuminate\Support\Facades\App::getLocale()]) }}">{{ $product->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>