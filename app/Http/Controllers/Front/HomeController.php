<?php

namespace App\Http\Controllers\Front;

use App\Banner;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->with('reviews')->get();
        $banners = Banner::orderBy('updated_at', 'desc')->take(4)->get();

        return view('index', compact('categories', 'products', 'banners'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout()
    {
        return view('about');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getServices()
    {
        return view('services');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact()
    {
        return view('contact');
    }
}
