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
        $aboutUs = Page::where('slug','about-us')->first();
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

        return view('pages.page', ['page' => $page]);
    }

    public function products()
    {
        $categories = Category::where('type','product')->get();
        $products = Products::all();

        return view('pages.products',['categories' => $categories, 'products' => $products]);
    }

    public function product($locale = null, $id)
    {
        $product = Products::find($id);

        if(!$product) {
            abort(404);
        }

        $prevProduct = Products::where('id', '<', $product->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextProduct = Products::where('id', '>', $product->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.product',['product' => $product, 'prevProduct' => $prevProduct, 'nextProduct' => $nextProduct]);
    }

    public function contact()
    {
        return view('pages.contact');
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
        return view('pages.photo-gallery');
    }

    public function blogs()
    {
        $blogs = Blog::paginate(8);
        return view('pages.blogs', compact('blogs'));
    }

    public function blog($locale = null, $id)
    {
        $blog = Blog::find($id);

        if(!$blog) {
            abort(404);
        }

        $prevBlog = Blog::where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextBlog = Blog::where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.blog', compact('blog','prevBlog','nextBlog'));
    }
}
