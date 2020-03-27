<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
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
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }
}
