<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Client;
use App\Models\ContactRequests;
use App\Models\Departments;
use App\Models\Doctors;
use App\Models\Faqs;
use App\Models\Features;
use App\Models\MenuItem;
use App\Models\Products;
use App\Models\Page;
use App\Models\Services;
use App\Models\Settings;
use App\Models\Sliders;
use App\Models\Testimonials;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Display the home page.
     *
     * @return View
     */
    public function dashboard(Request $request)
    {
        $sliders = Sliders::all();
        $aboutUs = Page::where('template','about_us')->first();
        $products = Products::all();
        $clients = Client::all();
        $blogs = Blog::orderBy('id','DESC')->limit(3)->get();

        return view('pages.home',['sliders' => $sliders, 'aboutUs' => $aboutUs, 'products' => $products, 'clients' => $clients, 'blogs' => $blogs]);
    }

    public function page($locale = null, $slug = null)
    {
        if (is_null($slug)) {
            abort(404);
        }

        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            abort(404);
        }

        $getMenu = MenuItem::where('page_id',$page->id)->first();

        return view('pages.page', ['page' => $page, 'getMenu' => $getMenu]);
    }

    public function products()
    {
        $categories = Category::where('type','product')->get();
        $products = Products::all();

        $getMenu = MenuItem::where('link','products')->where('type','internal_link')->first();

        return view('pages.products',['categories' => $categories, 'products' => $products, 'getMenu' => $getMenu]);
    }

    public function product($locale = null, $slug)
    {
        $product = Products::where('slug',$slug)->first();

        if(!$product) {
            abort(404);
        }

        $prevProduct = Products::where('id', '<', $product->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextProduct = Products::where('id', '>', $product->id)
            ->orderBy('id', 'asc')
            ->first();

        $getMenu = MenuItem::where('link','products')->where('type','internal_link')->first();

        return view('pages.product',['product' => $product, 'prevProduct' => $prevProduct, 'nextProduct' => $nextProduct, 'getMenu' => $getMenu]);
    }

    public function contact()
    {
        $getMenu = MenuItem::where('link','contact')->where('type','internal_link')->first();
        return view('pages.contact',compact('getMenu'));
    }

    public function contactForm(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Insert data into ContactRequest model
            ContactRequests::create([
                'full_name' => $request->full_name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Your message has been sent successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while sending your message.'
            ], 500);
        }
    }

    public function photoGallery()
    {
        $getMenu = MenuItem::where('link','photo-gallery')->where('type','internal_link')->first();

        return view('pages.photo-gallery',['getMenu' => $getMenu]);
    }

    public function blogs()
    {
        $blogs = Blog::paginate(8);
        $getMenu = MenuItem::where('link','blogs')->where('type','internal_link')->first();
        return view('pages.blogs', compact('blogs','getMenu'));
    }

    public function blog($locale = null, $slug)
    {
        $blog = Blog::where('slug',$slug)->first();

        if(!$blog) {
            abort(404);
        }

        $prevBlog = Blog::where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextBlog = Blog::where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        $getMenu = MenuItem::where('link','blogs')->where('type','internal_link')->first();

        return view('pages.blog', compact('blog','prevBlog','nextBlog','getMenu'));
    }
}
