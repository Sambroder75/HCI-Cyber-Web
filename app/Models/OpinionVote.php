<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpinionVote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'opinion_id',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function opinion()
    {
        return $this->belongsTo(Opinion::class);
    }
}