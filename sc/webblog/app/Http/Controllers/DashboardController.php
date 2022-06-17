<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.create', [
            'title' => 'Create Post'
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:100',
            'body' => 'required',
            'image' => 'image|file|max:5000'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect('/dashboard')->with('success', 'Post has been created successfully!');
    }
}
