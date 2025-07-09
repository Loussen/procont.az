@extends(backpack_view('blank'))

@php
    use App\Models\Products;
    use App\Models\Category;
    use App\Models\Blog;
    use App\Models\ContactRequests;
    use App\Models\PhotoGallery;
    use Illuminate\Support\Str;

    $productCount = Products::count();
    $categoryCount = Category::count();
    $blogCount = Blog::count();
    $contactRequestCount = \App\Models\ContactRequests::whereNull('read_at')->count();

    $galleryImages = PhotoGallery::first();
    $latestBlogs = Blog::latest()->take(3)->get();
    $latestProducts = Products::latest()->take(3)->get();
    $latestMessages = ContactRequests::latest()->take(5)->get();

    Widget::add()->to('before_content')->type('div')->class('row mt-4')->content([
        Widget::make()
            ->type('progress')
            ->class('card mb-4')
            ->statusBorder('start')
            ->accentColor('success')
            ->ribbon(['top', 'la-first-order'])
            ->progressClass('progress-bar')
            ->value($productCount.' məhsul')
            ->description('Məhsullar')
            ->wrapper([
                'element' => 'div',
                'onclick' => "window.location='".backpack_url('products')."';",
                'style' => 'cursor: pointer;',
            ]),

        Widget::make()
            ->type('progress')
            ->class('card mb-4')
            ->statusBorder('start')
            ->accentColor('info')
            ->ribbon(['top', 'la-first-order'])
            ->progressClass('progress-bar')
            ->value($categoryCount.' kateqoriya')
            ->description('Kateqoriyalar')
            ->wrapper([
                'element' => 'div',
                'onclick' => "window.location='".backpack_url('category')."';",
                'style' => 'cursor: pointer;',
            ]),

        Widget::make()
            ->type('progress')
            ->class('card mb-4')
            ->statusBorder('start')
            ->accentColor('danger')
            ->ribbon(['top', 'la-first-order'])
            ->progressClass('progress-bar')
            ->value($blogCount.' xəbər')
            ->description('Xəbərlər')
            ->wrapper([
                'element' => 'div',
                'onclick' => "window.location='".backpack_url('blog')."';",
                'style' => 'cursor: pointer;',
            ]),

        Widget::make()
            ->type('progress')
            ->class('card mb-4')
            ->statusBorder('start')
            ->accentColor('primary')
            ->ribbon(['top', 'la-first-order'])
            ->progressClass('progress-bar')
            ->value($contactRequestCount > 0
                ? '<span style="font-size: 20px;"><u style="color:red;">'.$contactRequestCount.'</u> ədəd yeni mesaj var</span>'
                : '<span style="font-size: 20px;">Yeni mesaj yoxdur</span>'
            )
            ->description('Mesajlar')
            ->wrapper([
                'element' => 'div',
                'onclick' => "window.location='".backpack_url('contact-requests')."';",
                'style' => 'cursor: pointer;',
            ]),
    ]);
@endphp

@section('content')
    {{-- Mövcud 'content' qrupundakı widget-lar varsa --}}
    @include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('group', 'content')->toArray() ])

    {{-- Qalereya şəkilləri --}}
    <div class="card p-3 mb-4">
        <h5 class="mb-3"><a class="text-decoration-underline" href="{{ backpack_url('photo-gallery',[1,'edit']) }}"> Qalereya şəkilləri</a></h5>
        <div class="row">
            @foreach($galleryImages->images as $image)
                @php
                    $info = pathinfo($image);
                    $thumbPath = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
                @endphp
                <div class="col-md-2 mb-2">
                    <a href="{{ Storage::disk('site_gallery')->url($image) }}" target="_blank">
                        <img src="{{ Storage::disk('site_gallery')->url($thumbPath) }}" class="img-fluid rounded shadow-sm" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Son xəbərlər --}}
    <div class="card p-3 mb-4">
        <h5 class="mb-3"><a class="text-decoration-underline" href="{{ backpack_url('blog') }}"> Son xəbərlər</a></h5>
        <ul class="list-group">
            @foreach($latestBlogs as $blog)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ url('/manage/blog/'.$blog->id.'/edit') }}">
                        <span>{{ $blog->title }}</span>
                    </a>
                    <small class="text-muted">{{ $blog->created_at->format('d.m.Y') }}</small>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Son məhsullar --}}
    <div class="card p-3 mb-4">
        <h5 class="mb-3"><a class="text-decoration-underline" href="{{ backpack_url('products') }}"> Son məhsullar</a></h5>
        <ul class="list-group">
            @foreach($latestProducts as $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ url('/manage/products/'.$product->id.'/edit') }}">
                        <span>{{ $product->name }}</span>
                    </a>
                    <small class="text-muted">{{ $product->created_at->format('d.m.Y') }}</small>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Əlaqə mesajları --}}
    <div class="card p-3 mb-5">
        <h5 class="mb-3"><a class="text-decoration-underline" href="{{ backpack_url('contact-requests') }}"> Əlaqə mesajları</a></h5>
        <ul class="list-group">
            @foreach($latestMessages as $msg)
                <li class="list-group-item">
                    <a href="{{ url('/manage/contact-requests/'.$msg->id.'/show') }}">
                        <strong>{{ $msg->full_name }}:</strong> {{ Str::limit(strip_tags($msg->message), 50) }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
