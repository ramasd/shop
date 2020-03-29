<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    const DEFAULT_IMAGE_STORAGE_URL = 'photos/default.png';

    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $path = self::DEFAULT_IMAGE_STORAGE_URL;

        if ($request->file('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'photo' => $path
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product has been created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProductRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $path = $product->photo;
        $file = '/public/'.$path;

        if ($request->file('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'photo' => $path
        ]);

        if (Storage::exists($file) AND $path != self::DEFAULT_IMAGE_STORAGE_URL) {
            Storage::delete($file);
        }

        return redirect()->route('admin.products.index')->with('success', 'Product has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $path = "";
        if($product->photo) {
            $path = $product->photo;
        }

        $file = '/public/'.$path;

        if (Storage::exists($file) AND $path != self::DEFAULT_IMAGE_STORAGE_URL) {
            Storage::delete($file);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product has been deleted successfully!');
    }
}
