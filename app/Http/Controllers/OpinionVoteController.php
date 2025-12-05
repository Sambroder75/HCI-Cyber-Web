<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\OpinionVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpinionVoteController extends Controller
{

    public function vote(Opinion $opinion, int $type)
    {
        if (!in_array($type, [1, -1])) {
            return back()->withErrors(['error' => 'Nilai voting tidak valid.']);
        }

        $userId = auth()->id();
        $existingVote = $opinion->votes()->where('user_id', $userId)->first();

        DB::transaction(function () use ($opinion, $userId, $existingVote, $type) {
            
            if ($existingVote) {
                if ($existingVote->type == $type) {
                    $existingVote->delete();
                    $change = -$type; 

                } else {
                    $existingVote->type = $type;
                    $existingVote->save();
                    $change = 2 * $type; 
                }
            } else {
                OpinionVote::create([
                    'user_id' => $userId,
                    'opinion_id' => $opinion->id,
                    'type' => $type,
                ]);
                $change = $type;
            }

            $opinion->increment('upvotes', $change);
        });

        return back();
    }
}