<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Storage;

class VacancyController extends Controller
{

    public function index()
    {
        $vacancies = Vacancy::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.vacancies.index', compact('vacancies'));
    }


    public function publicIndex()
    {
        $vacancies = Vacancy::where('is_active', 1)

            ->select('id', 'title_' . app()->getLocale() . ' as title', 'image')
            ->orderBy('created_at')
            ->paginate(6);

        return view('vacancies.index', compact('vacancies'));
    }

    public function publicShow($locale, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $title = 'title_' . $locale;
        $description = 'description_' . $locale;
        $data = [
            'id' => $vacancy->id,
            'title' => $vacancy->$title,
            'description' => $vacancy->$description,
            'image' => $vacancy->image,
        ];
    
        return view('vacancies.show', [
            'data' => $data,
            'image' => $vacancy->image // Передаем переменную image
        ]);
    }
    


    public function create()
    {
        return view('admin.vacancies.create');
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
            $imagePath = $request->file('image')->store('vacancy_images', 'public');
        }

        Vacancy::create([
            'title_ru' => $request->title_ru,
            'description_ru' => $request->description_ru,
            'title_en' => $request->title_en,
            'description_en' => $request->description_en,
            'title_tk' => $request->title_tk,
            'description_tk' => $request->description_tk,
            'image' => $imagePath,
            'is_active' => true,
        ]);

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy created successfully.');
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
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.vacancies.edit', compact('vacancy'));
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

        $vacancy = Vacancy::findOrFail($id);

        // Получите путь к изображению из входных данных
        $imagePath = $request->input('image');

        $vacancy->title_ru = $request->title_ru;
        $vacancy->description_ru = $request->description_ru;
        $vacancy->title_en = $request->title_en;
        $vacancy->description_en = $request->description_en;
        $vacancy->title_tk = $request->title_tk;
        $vacancy->description_tk = $request->description_tk;
        $vacancy->image = $imagePath; // Сохраните путь к изображению
        $vacancy->is_active = $request->has('is_active');

        $vacancy->save();

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        if ($vacancy->image) {
            Storage::disk('public')->delete($vacancy->image);
        }

        $vacancy->delete();

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy deleted successfully.');
    }
    
}
