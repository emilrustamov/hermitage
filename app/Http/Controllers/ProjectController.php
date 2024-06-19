<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use Illuminate\Support\Facades\Storage;
use App\Events\NewprojectPost;
use Carbon\Carbon;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }


    public function publicIndex()
    {
        $projects = Project::where('is_active', 1)

            ->select('id', 'title_' . app()->getLocale() . ' as title', 'image')
            ->orderBy('created_at')
            ->paginate(6);

        return view('projects.index', compact('projects'));
    }



    public function publicShow($locale, $id)
    {
        $project = Project::findOrFail($id);
        $title = 'title_' . $locale;
        $description = 'description_' . $locale;
        $data = [
            'id' => $project->id,
            'title' => $project->$title,
            'description' => $project->$description,
            'image' => $project->image,
            'created_at' => Carbon::parse($project->created_at)->format('d.m.Y'), // Форматируем дату
        ];

        return view('projects.show', [
            'data' => $data,
            'image' => $project->image
        ]);
    }



    public function create()
    {
        return view('admin.projects.create');
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
            'year' => 'required|date_format:Y-m-d',
            'video' => 'nullable|string',
        ]);


        $imagePath = $request->image;
        $videoPath = $request->video;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('project_images', 'public');
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('project_videos', 'public');
        }

        $project = Project::create([
            'title_ru' => $request->title_ru,
            'description_ru' => $request->description_ru,
            'title_en' => $request->title_en,
            'description_en' => $request->description_en,
            'title_tk' => $request->title_tk,
            'description_tk' => $request->description_tk,
            'image' => $imagePath,
            'year' => $request->year,
            'video' => $videoPath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
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
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
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

        $project = Project::findOrFail($id);

        // Получите путь к изображению из входных данных
        $imagePath = $request->input('image');

        $project->title_ru = $request->title_ru;
        $project->description_ru = $request->description_ru;
        $project->title_en = $request->title_en;
        $project->description_en = $request->description_en;
        $project->title_tk = $request->title_tk;
        $project->description_tk = $request->description_tk;
        $project->image = $imagePath; // Сохраните путь к изображению
        $project->is_active = $request->has('is_active');

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'project deleted successfully.');
    }
}
