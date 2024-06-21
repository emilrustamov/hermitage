<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificatesController extends Controller
{
   
    public function publicIndex()
    {
        $certificates = Certificate::orderBy('ordering')->get();
        return view('certificates', compact('certificates'));
    }


    // Метод для админки
    public function index()
    {
        $certificates = Certificate::orderBy('ordering')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ordering' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('certificates', 'public');

        Certificate::create([
            'ordering' => $request->ordering,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate added successfully.');
    }

    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ordering' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $certificate = Certificate::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('certificates', 'public');
            Storage::disk('public')->delete($certificate->image);
            $certificate->image = $imagePath;
        }

        $certificate->ordering = $request->ordering;
        $certificate->save();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        Storage::disk('public')->delete($certificate->image);
        $certificate->delete();

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
