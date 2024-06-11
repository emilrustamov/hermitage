<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class PublicVacancyController extends Controller
{
    public function index($locale)
    {
        $vacancies = Vacancy::where('is_active', 1)
            ->whereNotNull('image')
            ->select('id', 'title_' . $locale . ' as title', 'image')
            ->get();

        return view('vacancies.index', compact('vacancies'));
    }

    public function show($locale, $id)
    {
        $vacancy = Vacancy::where('is_active', 1)
            ->where('id', $id)
            ->select('id', 'title_' . $locale . ' as title', 'description_' . $locale . ' as description', 'image')
            ->firstOrFail();

        return view('vacancies.show', compact('vacancy'));
    }
}
