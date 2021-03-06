<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $banners = Banner::all();

        return view('banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBannerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBannerRequest $request)
    {
        $path = '';

        if ($request->file('photo')) {
            $path = $request->file('photo')->store('banners', 'public');
        }

        Banner::create([
            'name' => $request->name,
            'description' => $request->description,
            'path' => $path
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);

        return view('banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $path = '';

        if ($banner->path) {
            $path = $banner->path;
        }

        if ($request->file('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
        }

        $banner->update([
            'name' => $request->name,
            'description' => $request->description,
            'path' => $path
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner has been deleted successfully!');
    }
}
