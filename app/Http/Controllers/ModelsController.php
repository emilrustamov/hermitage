<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ModelsController extends Controller
{
    public function index()
    {
        $models = Models::query()->orderBy('created_at')->paginate(20);
        return view('admin.models.index', compact('models'));
    }


    public function publicIndex()
    {
        $models = Models::where('is_active', 1)
            ->select('id', 'title', 'image', 'file')
            ->orderBy('ordering')
            ->get();

        return view('models', compact('models'));
    }


    public function publicShow($id)
    {
        $model = Models::findOrFail($id);
        $title = 'title';

        $data = [
            'id' => $model->id,
            'title' => $model->$title,
            'image' => $model->image,
            'file' => $model->file,
            'created_at' => Carbon::parse($model->created_at)->format('d.m.Y'),
        ];

        return view('models.show', [
            'data' => $data,
            'image' => $model->image,
            'file' => $model->file,
        ]);
    }



    public function create()
    {
        return view('admin.models.create');
    }


    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'ordering' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'file' => 'nullable|file|mimes:pdf,zip,rar,doc,docx|max:10000',
    ]);

    $imagePath = $request->file('image') ? $request->file('image')->store('model_images', 'public') : null;
    $filePath = $request->file('file') ? $request->file('file')->store('model_files', 'public') : null;

    Models::create([
        'title' => $request->title,
        'ordering' => $request->ordering,
        'image' => $imagePath,
        'file' => $filePath, // Добавляем это
        'is_active' => $request->has('is_active'),
    ]);

    return redirect()->route('admin.models.index')->with('success', 'Model created successfully.');
}



    public function show(string $id)
    {
    }


    public function edit($id)
    {
        $model = Models::findOrFail($id);
        return view('admin.models.edit', compact('model'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'ordering' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'nullable|file|mimes:pdf,zip,rar,doc,docx|max:10000',
        ]);

        $model = Models::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('model_images', 'public');
            if ($model->image) {
                Storage::disk('public')->delete($model->image);
            }
            $model->image = $imagePath;
        }

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('model_files', 'public');
            if ($model->file) {
                Storage::disk('public')->delete($model->file);
            }
            $model->file = $filePath;
        }

        $model->title = $request->title;
        $model->ordering = $request->ordering;
        $model->is_active = $request->has('is_active');

        $model->save();

        return redirect()->route('admin.models.index')->with('success', 'Model updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $model = Models::findOrFail($id);

        if ($model->image) {
            Storage::disk('public')->delete($model->image);
        }

        if ($model->file) {
            Storage::disk('public')->delete($model->file);
        }

        $model->delete();

        return redirect()->route('admin.models.index')->with('success', 'Model deleted successfully.');
    }
}
