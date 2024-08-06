<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    $request->validate([
        'page_identifier' => 'required|string',
        'banner' => 'nullable|string',
        'video' => 'nullable|string', // Новый валидатор для видео
    ]);

    $banner = Banner::findOrFail($id);

    if ($request->has('banner')) {
        $bannerPath = str_replace(url('/storage') . '/', '', $request->banner);
        $banner->banner = $bannerPath;
    }

    if ($request->has('video')) {
        $videoPath = str_replace(url('/storage') . '/', '', $request->video);
        $banner->video = $videoPath;
    }

    $banner->page_identifier = $request->page_identifier;
    $banner->save();

    return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
}



    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_identifier' => 'required|string',
            'banner' => 'nullable|string',
            'video' => 'nullable|string', // Новый валидатор для видео
        ]);

        $bannerPath = $request->has('banner') ? str_replace(url('/storage') . '/', '', $request->banner) : null;
        $videoPath = $request->has('video') ? str_replace(url('/storage') . '/', '', $request->video) : null;

        // Сохраняем новый баннер
        Banner::create([
            'page_identifier' => $request->page_identifier,
            'banner' => $bannerPath,
            'video' => $videoPath,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }



    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->banner) {
            // Удаляем файл баннера, если он существует
            Storage::disk('public')->delete($banner->banner);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
