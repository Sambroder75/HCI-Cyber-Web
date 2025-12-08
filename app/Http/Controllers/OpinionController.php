<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function index(Request $request)
    {
        $query = Opinion::latest();
        
        if ($request->has('search') && $request->search != null) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('category') && $request->category != 'All') {
            $query->where('category', $request->category);
        }
        
        $opinions = $query->with(['user', 'votes'])->get();

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
            'category' => 'required|string',
        ]);

        Opinion::create([
            'user_id' => auth()->id(),
            'title' => $request->title, 
            'text' => $request->text,
            'category' => $request->category,
            'upvotes' => 0,
        ]);

        return redirect()->route('opinion')->with('success', 'Opini Anda berhasil diposting!');
    }
}