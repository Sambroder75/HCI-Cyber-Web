<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the input
        $request->validate([
            'content' => 'required|max:500',
        ]);

        // 2. Create the comment
        Comment::create([
            'user_id' => Auth::id(), // Get the currently logged-in user's ID
            'content' => $request->content,
        ]);

        // 3. Redirect back with a success message
        return back()->with('success', 'Comment posted successfully!');
    }
}