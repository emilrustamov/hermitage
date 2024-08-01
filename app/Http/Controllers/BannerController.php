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
        'banner' => 'nullable|string', // Здесь ожидается строка URL
    ]);

    $banner = Banner::findOrFail($id);

    // Сохранение данных для отладки
    // dd($request->all());

    // Сохраняем путь к изображению в базу данных
    $banner->page_identifier = $request->page_identifier;
    $banner->banner = $request->banner; // Сохраняем путь, переданный через форму

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
            'banner' => 'nullable|string', // Здесь ожидается строка URL
        ]);

        // Сохраняем новый баннер
        Banner::create([
            'page_identifier' => $request->page_identifier,
            'banner' => $request->banner, // Сохраняем путь, переданный через форму
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
