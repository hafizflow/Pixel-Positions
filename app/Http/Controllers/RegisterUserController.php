<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class RegisterUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userAttributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users, email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $employerAttributes = request()->validate([
            'employer' => ['required', 'string', 'max:255'],
            'logo' => ['required', File::types(['png', 'jpg', 'webp']), 'max:2048'],
        ]);

        $user = User::create($userAttributes);

        $logoPath = $request->logo->store('public');

        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoPath,
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
