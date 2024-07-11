<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.contracts.index', compact('contracts'));
    }

    public function publicIndex()
    {
        $contracts = Contract::where('is_active', 1)
            ->select('id', 'title_' . app()->getLocale() . ' as title', 'image', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($contracts as $contract) {
            $contract->year = \Carbon\Carbon::parse($contract->year)->format('Y');
        }

        $contracts = $contracts->groupBy('year');

        return view('contracts.index', compact('contracts'));
    }

    public function publicShow($locale, $id)
    {
        $contract = Contract::findOrFail($id);
        $title = 'title_' . $locale;
        $description = 'description_' . $locale;
        $designer = 'designer_' . $locale;
        $architect = 'architect_' . $locale;
        $location = 'location_' . $locale;
        $data = [
            'id' => $contract->id,
            'title' => $contract->$title,
            'description' => $contract->$description,
            'image' => $contract->image,
            'year' => Carbon::parse($contract->year)->format('Y'), // Добавлено для формата года
            'designer' => $contract->$designer,
            'architect' => $contract->$architect,
            'area' => $contract->area,
            'location' => $contract->$location,
            'created_at' => Carbon::parse($contract->created_at)->format('d.m.Y'), // Форматируем дату
            'video' => $contract->video,
            'plan_image' => $contract->plan_image,
            'photos' => json_decode($contract->photos, true) ?? [], // Убедимся, что данные декодируются в массив
        ];

        return view('contracts.show', [
            'data' => $data,
            'image' => $contract->image
        ]);
    }



    public function create()
    {
        return view('admin.contracts.create');
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
            'year' => 'required|date_format:Y-m-d',
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

        $contract = Contract::create([
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

        return redirect()->route('admin.contracts.index')->with('success', 'Contract created successfully.');
    }


    public function edit($id)
    {
        $contract = Contract::findOrFail($id);
        return view('admin.contracts.edit', compact('contract'));
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
            'year' => 'required|date_format:Y-m-d',
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

        $contract = Contract::findOrFail($id);

        if ($request->image) {
            $contract->image = $request->image;
        }

        if ($request->plan_image) {
            $contract->plan_image = $request->plan_image;
        }

        // Clear existing photos and add new ones
        $photos = json_decode($contract->photos, true) ?? [];
        if ($request->hasFile('photos')) {
            // Delete old photos if new photos are uploaded
            foreach ($photos as $existingPhoto) {
                Storage::disk('public')->delete($existingPhoto);
            }
            $photos = []; // Reset the photos array
            // Add new photos
            foreach ($request->file('photos') as $photo) {
                $photos[] = $photo->store('contract_photos', 'public');
            }
        } elseif ($request->photos) {
            // Handle photos input as comma-separated list of paths
            $photos = explode(',', $request->photos);
        }


        $contract->title_ru = $request->title_ru;
        $contract->description_ru = $request->description_ru;
        $contract->title_en = $request->title_en;
        $contract->description_en = $request->description_en;
        $contract->title_tk = $request->title_tk;
        $contract->description_tk = $request->description_tk;
        $contract->year = $request->year;
        $contract->video = $request->video;
        $contract->location_ru = $request->location_ru;
        $contract->location_en = $request->location_en;
        $contract->location_tk = $request->location_tk;
        $contract->area = $request->area;
        $contract->designer_ru = $request->designer_ru;
        $contract->designer_en = $request->designer_en;
        $contract->designer_tk = $request->designer_tk;
        $contract->architect_ru = $request->architect_ru;
        $contract->architect_en = $request->architect_en;
        $contract->architect_tk = $request->architect_tk;
        $contract->is_active = $request->has('is_active');
        $contract->photos = json_encode($photos);

        $contract->save();

        return redirect()->route('admin.contracts.index')->with('success', 'Contract updated successfully.');
    }




    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);

        if ($contract->image) {
            Storage::disk('public')->delete($contract->image);
        }

        if ($contract->plan_image) {
            Storage::disk('public')->delete($contract->plan_image);
        }

        $contract->delete();

        return redirect()->route('admin.contracts.index')->with('success', 'Contract deleted successfully.');
    }
}
