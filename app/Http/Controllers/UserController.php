<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'company_name' => 'nullable|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'contact' => 'required|string|max:255',
        'status' => 'required|string|in:pending,enabled,disabled',
    ]);

    $data['password'] = Hash::make($data['password']);
    $data['subscribe_to_blog'] = $request->has('subscribe_to_blog') ? true : false;
    $data['is_admin'] = $request->has('is_admin') ? true : false;

    User::create($data);

    return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
}



    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'contact' => 'required|string|max:255',
            'status' => 'required|string|in:pending,enabled,disabled',
            'is_admin' => 'boolean',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        // Установим значения для чекбоксов
        $data['subscribe_to_blog'] = $request->has('subscribe_to_blog');
        $data['is_admin'] = $request->has('is_admin');

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => $request->status]);

        return redirect()->route('admin.users.index')->with('success', 'User status updated successfully.');
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_admin' => true]);

        return redirect()->route('admin.users.index')->with('success', 'User is now an admin.');
    }

    public function unmakeAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_admin' => false]);

        return redirect()->route('admin.users.index')->with('success', 'User is no longer an admin.');
    }
}
