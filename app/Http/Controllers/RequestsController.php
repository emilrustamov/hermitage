<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requestcalc;

class RequestsController extends Controller
{

    public function index()
    {
        return view('requests');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'work_scope' => 'required|array',
            'area' => 'required|integer',
            'location' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'message' => 'nullable|string',
        ]);

        $userId = auth()->check() ? auth()->id() : null;

        Requestcalc::create([
            'user_id' => $userId,
            'type' => $request->type,
            'work_scope' => $request->work_scope,
            'area' => $request->area,
            'location' => $request->location,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Заявка успешно отправлена');
    }
    public function adminIndex()
    {
        $requests = Requestcalc::with('user')->get();
        return view('admin.requests.index', compact('requests'));
    }
}
