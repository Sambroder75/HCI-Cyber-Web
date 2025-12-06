<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function index(Request $request)
    {
        $query = Opinion::latest();
        
        
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            
            
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }
        
        $opinions = $query->with('user')->get();

        return view('opinion', compact('opinions'));
    }

    public function create()
    {
        return view('createopinion');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'text' => 'required|string|max:1000',
        ]);

        Opinion::create([
            'user_id' => auth()->id(),
            'title' => $request->title, 
            'text' => $request->text,
        ]);

        return redirect()->route('opinion')->with('success', 'Opini Anda berhasil diposting!');
    }
}