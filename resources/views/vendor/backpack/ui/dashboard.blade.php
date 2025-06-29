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
    $contactRequestCount = ContactRequests::count();

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
            ->description('Məhsullar'),

        Widget::make()
            ->type('progress')
            ->class('card mb-4')
            ->statusBorder('start')
            ->accentColor('info')
            ->ribbon(['top', 'la-first-order'])
            ->progressClass('progress-bar')
            ->value($categoryCount.' kateqoriya')
            ->description('Kateqoriyalar'),

        Widget::make()
            ->type('progress')
            ->class('card mb-4')
            ->statusBorder('start')
            ->accentColor('danger')
            ->ribbon(['top', 'la-first-order'])
            ->progressClass('progress-bar')
            ->value($blogCount.' xəbər')
            ->description('Xəbərlər'),

        Widget::make()
            ->type('progress')
            ->class('card mb-4')
            ->statusBorder('start')
            ->accentColor('primary')
            ->ribbon(['top', 'la-first-order'])
            ->progressClass('progress-bar')
            ->value($contactRequestCount.' əlaqə mesajı')
            ->description('Mesajlar'),
    ]);
@endphp

@section('content')
    {{-- Mövcud 'content' qrupundakı widget-lar varsa --}}
    @include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('group', 'content')->toArray() ])

    {{-- Qalereya şəkilləri --}}
    <div class="card p-3 mb-4">
        <h5 class="mb-3">Qalereya şəkilləri</h5>
        <div class="row">
            @foreach($galleryImages->images as $image)
                @php
                    $info = pathinfo($image);
                    $thumbPath = $info['dirname'] . '/' . $info['filename'] . '_thumb.' . $info['extension'];
                @endphp
                <div class="col-md-2 mb-2">
                    <img src="{{ Storage::disk('site_gallery')->url($thumbPath) }}" class="img-fluid rounded shadow-sm" />
                </div>
            @endforeach
        </div>
    </div>

    {{-- Son xəbərlər --}}
    <div class="card p-3 mb-4">
        <h5 class="mb-3">Son xəbərlər</h5>
        <ul class="list-group">
            @foreach($latestBlogs as $blog)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $blog->title }}</span>
                    <small class="text-muted">{{ $blog->created_at->format('d.m.Y') }}</small>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Son məhsullar --}}
    <div class="card p-3 mb-4">
        <h5 class="mb-3">Son məhsullar</h5>
        <ul class="list-group">
            @foreach($latestProducts as $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $product->name }}</span>
                    <small class="text-muted">{{ $product->created_at->format('d.m.Y') }}</small>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Əlaqə mesajları --}}
    <div class="card p-3 mb-5">
        <h5 class="mb-3">Əlaqə mesajları</h5>
        <ul class="list-group">
            @foreach($latestMessages as $msg)
                <li class="list-group-item">
                    <strong>{{ $msg->full_name }}:</strong> {{ Str::limit(strip_tags($msg->message), 50) }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
