<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfileRequest $request)
    {
        $user = Auth::user();

        if ($request->filled('current_password')) {
            $request->validate([
                'current_password' => ['required'],
                'new_password' => ['required', 'min:8', 'confirmed'],
            ]);
    
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
            }
    
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
        }

        $user->update($request->validated());

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully');
    }
}