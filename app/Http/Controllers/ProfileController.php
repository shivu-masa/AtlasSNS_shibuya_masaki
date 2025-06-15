<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profiles.profile');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profiles.profile', compact('user'));
    }

    public function edit()
{
    $user = Auth::user();
    return view('profiles.edit', compact('user'));
}

public function update(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
         'username' => 'required|string|min:2|max:12',
        'email' => 'required|email|min:5|max:40|unique:users,email,' . $user->id,
        'bio' => 'nullable|string|max:150',
        'icon_image' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg|max:2048',
        'password' => 'required|string|min:8|max:20|confirmed',
        'password_confirmation' =>'required|string|min:8|max:20|confirmed'
    ]);

    if ($request->hasFile('icon_image')) {
        $path = $request->file('icon_image')->store('icons', 'public');
        $user->icon_image = $path;
    }

    $user->username = $validated['username'];
    $user->email = $validated['email'];
    $user->bio = $validated['bio'] ?? null;

    if (!empty($validated['password'])) {
        $user->password = bcrypt($validated['password']);
    }

    $user->save();

    return redirect()->route('top')->with('success', 'プロフィールを更新しました。');
}
}
