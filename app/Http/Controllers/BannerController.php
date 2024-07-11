<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'page_identifier' => 'required|string|unique:banners,page_identifier,' . $banner->id,
            'banner' => 'nullable|string',
        ]);

        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('banners', 'public');
            $banner->banner = $bannerPath;
        }

        $banner->page_identifier = $request->page_identifier;
        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully');
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_identifier' => 'required|string|unique:banners',
            'banner' => 'nullable|string',
        ]);

        $bannerPath = null;
        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('banners', 'public');
        }

        Banner::create([
            'page_identifier' => $request->page_identifier,
            'banner' => $bannerPath,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully');
    }
}
