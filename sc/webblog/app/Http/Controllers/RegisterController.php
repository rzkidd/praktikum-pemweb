<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Registration Page'
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|min:4|max:12|unique:users',
            'password' => 'required|min:4|max:12|confirmed',
            'password_confirmation' => 'required_with:password|same:password'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfull!');
    }
}
