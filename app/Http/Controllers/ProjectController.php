<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
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
            ->select('id', 'title_' . app()->getLocale() . ' as title', 'image', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // foreach ($projects as $project) {
        //     $project->year = \Carbon\Carbon::parse($project->year)->format('Y');
        // }

        $projects = $projects->groupBy('year');

        return view('projects.index', compact('projects'));
    }

    public function publicShow($locale, $id)
    {
        $project = Project::findOrFail($id);
        $title = 'title_' . $locale;
        $description = 'description_' . $locale;
        $designer = 'designer_' . $locale;
        $architect = 'architect_' . $locale;
        $location = 'location_' . $locale;
        $data = [
            'id' => $project->id,
            'title' => $project->$title,
            'description' => $project->$description,
            'image' => $project->image,
            'year' => $project->year,
            'designer' => $project->$designer,
            'architect' => $project->$architect,
            'area' => $project->area,
            'location' => $project->$location,
            'created_at' => Carbon::parse($project->created_at)->format('d.m.Y'), // Форматируем дату
            'video' => $project->video,
            'plan_image' => $project->plan_image,
            'photos' => json_decode($project->photos, true) ?? [], // Убедимся, что данные декодируются в массив
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
            'image' => 'nullable|string', // Changed to accept string for the path
            'plan_image' => 'nullable|string', // Changed to accept string for the path
            'year' => 'required|integer',
            'video' => 'nullable|string',
            'location_ru' => 'nullable|string|max:255',
            'location_en' => 'nullable|string|max:255',
            'location_tk' => 'nullable|string|max:255',
            'area' => 'nullable|integer',
            'designer_ru' => 'nullable|string|max:255',
            'designer_en' => 'nullable|string|max:255',
            'designer_tk' => 'nullable|string|max:255',
            'architect_ru' => 'nullable|string|max:255',
            'architect_en' => 'nullable|string|max:255',
            'architect_tk' => 'nullable|string|max:255',
            'photos.*' => 'nullable|string' // Changed to accept string for the path
        ]);

        $photos = $request->photos ? explode(',', $request->photos) : [];

        $imagePath = $request->image;
        $planImagePath = $request->plan_image;
        $videoPath = $request->video;

        $project = Project::create([
            'title_ru' => $request->title_ru,
            'description_ru' => $request->description_ru,
            'title_en' => $request->title_en,
            'description_en' => $request->description_en,
            'title_tk' => $request->title_tk,
            'description_tk' => $request->description_tk,
            'image' => $imagePath,
            'plan_image' => $planImagePath,
            'year' => $request->year,
            'video' => $videoPath,
            'is_active' => $request->has('is_active'),
            'location_ru' => $request->location_ru,
            'location_en' => $request->location_en,
            'location_tk' => $request->location_tk,
            'area' => $request->area,
            'designer_ru' => $request->designer_ru,
            'designer_en' => $request->designer_en,
            'designer_tk' => $request->designer_tk,
            'architect_ru' => $request->architect_ru,
            'architect_en' => $request->architect_en,
            'architect_tk' => $request->architect_tk,
            'photos' => json_encode($photos) // Save photos as JSON
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }


    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'description_ru' => 'required|string',
            'title_en' => 'required|string|max:255',
            'description_en' => 'required|string',
            'title_tk' => 'required|string|max:255',
            'description_tk' => 'required|string',
            'image' => 'nullable|string', // Changed to accept string for the path
            'plan_image' => 'nullable|string', // Changed to accept string for the path
            'year' => 'required|integer',
            'video' => 'nullable|string',
            'location_ru' => 'nullable|string|max:255',
            'location_en' => 'nullable|string|max:255',
            'location_tk' => 'nullable|string|max:255',
            'area' => 'nullable|integer',
            'designer_ru' => 'nullable|string|max:255',
            'designer_en' => 'nullable|string|max:255',
            'designer_tk' => 'nullable|string|max:255',
            'architect_ru' => 'nullable|string|max:255',
            'architect_en' => 'nullable|string|max:255',
            'architect_tk' => 'nullable|string|max:255',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validation for photos
        ]);

        $project = Project::findOrFail($id);

        if ($request->image) {
            $project->image = $request->image;
        }

        if ($request->plan_image) {
            $project->plan_image = $request->plan_image;
        }

        // Clear existing photos and add new ones
        $photos = json_decode($project->photos, true) ?? [];
        if ($request->hasFile('photos')) {
            // Delete old photos if new photos are uploaded
            foreach ($photos as $existingPhoto) {
                Storage::disk('public')->delete($existingPhoto);
            }
            $photos = []; // Reset the photos array
            // Add new photos
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('project_photos', 'public');
            }
        } elseif ($request->photos) {
            // Handle photos input as comma-separated list of paths
            $photos = explode(',', $request->photos);
        }


        $project->title_ru = $request->title_ru;
        $project->description_ru = $request->description_ru;
        $project->title_en = $request->title_en;
        $project->description_en = $request->description_en;
        $project->title_tk = $request->title_tk;
        $project->description_tk = $request->description_tk;
        $project->year = $request->year;
        $project->video = $request->video;
        $project->location_ru = $request->location_ru;
        $project->location_en = $request->location_en;
        $project->location_tk = $request->location_tk;
        $project->area = $request->area;
        $project->designer_ru = $request->designer_ru;
        $project->designer_en = $request->designer_en;
        $project->designer_tk = $request->designer_tk;
        $project->architect_ru = $request->architect_ru;
        $project->architect_en = $request->architect_en;
        $project->architect_tk = $request->architect_tk;
        $project->is_active = $request->has('is_active');
        $project->photos = json_encode($photos);

        $project->save();

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }




    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        if ($project->plan_image) {
            Storage::disk('public')->delete($project->plan_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
