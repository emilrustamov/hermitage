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
            ->select('id', 'title', 'image',)
            ->orderBy('ordering')
            ->get();
        return view('models.index', compact('models'));
    }


    public function publicShow($id)
    {
        $model = Models::findOrFail($id);
        $title = 'title';

        $data = [
            'id' => $model->id,
            'title' => $model->$title,
            'image' => $model->image,
            'created_at' => Carbon::parse($model->created_at)->format('d.m.Y'),
        ];

        return view('models.show', [
            'data' => $data,
            'image' => $model->image
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
            'image' => 'nullable|string',

        ]);

        $imagePath = $request->image;


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('model_images', 'public');
        }



        $model = Models::create([
            'title' => $request->title,
            'ordering' => $request->ordering,
            'image' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.models.index')->with('success', 'Models created successfully.');
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
            'image' => 'nullable|string',
        ]);

        $model = Models::findOrFail($id);
        $imagePath = $request->input('image');
        $model->title = $request->title;
        $model->ordering = $request->ordering;
        $model->image = $imagePath;
        $model->is_active = $request->has('is_active');

        $model->save();

        return redirect()->route('admin.models.index')->with('success', 'model updated successfully.');
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

        $model->delete();

        return redirect()->route('admin.models.index')->with('success', 'model deleted successfully.');
    }
}
