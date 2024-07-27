<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use App\Events\NewBlogPost;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.blogs.index', compact('blogs'));
    }


    public function publicIndex()
    {
        $blogs = Blog::where('is_active', 1)

            ->select('id', 'title_' . app()->getLocale() . ' as title', 'image')
            ->orderBy('created_at')
            ->paginate(6);

        return view('blogs.index', compact('blogs'));
    }


    public function publicShow($locale, $id)
    {
        $blog = Blog::findOrFail($id);
        $title = 'title_' . $locale;
        $description = 'description_' . $locale;
        $data = [
            'id' => $blog->id,
            'title' => $blog->$title,
            'description' => $blog->$description,
            'image' => $blog->image,
            'created_at' =>  $blog->created_at,
        ];

        return view('blogs.show', [
            'data' => $data,
            'image' => $blog->image
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'description_ru' => 'required|string',
            'title_en' => 'required|string|max:255',
            'description_en' => 'required|string',
            'title_tk' => 'required|string|max:255',
            'description_tk' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        $blog = Blog::create([
            'title_ru' => $request->title_ru,
            'description_ru' => $request->description_ru,
            'title_en' => $request->title_en,
            'description_en' => $request->description_en,
            'title_tk' => $request->title_tk,
            'description_tk' => $request->description_tk,
            'image' => $imagePath,
            'is_active' => true,
        ]);
        event(new NewBlogPost($blog));

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'description_ru' => 'required|string',
            'title_en' => 'required|string|max:255',
            'description_en' => 'required|string',
            'title_tk' => 'required|string|max:255',
            'description_tk' => 'required|string',
            'image' => 'nullable|string', // Изменено для приема строки URL
        ]);

        $blog = Blog::findOrFail($id);

        // Получите путь к изображению из входных данных
        $imagePath = $request->input('image');

        $blog->title_ru = $request->title_ru;
        $blog->description_ru = $request->description_ru;
        $blog->title_en = $request->title_en;
        $blog->description_en = $request->description_en;
        $blog->title_tk = $request->title_tk;
        $blog->description_tk = $request->description_tk;
        $blog->image = $imagePath; // Сохраните путь к изображению
        $blog->is_active = $request->has('is_active');

        $blog->save();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
