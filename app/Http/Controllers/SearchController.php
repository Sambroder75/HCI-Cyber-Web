<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');
        
        // Validation: If search is empty, just return empty results
        if (!$query) {
            return view('search', ['posts' => [], 'query' => '']);
        }

        // Search logic: Find posts where Title OR Content matches the query
        $posts = Post::where('title', 'LIKE', "%{$query}%")
                     ->orWhere('content', 'LIKE', "%{$query}%")
                     ->orderBy('created_at', 'desc')
                     ->get();

        return view('search', compact('posts', 'query'));
    }
}