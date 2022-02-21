<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'rahmen',
        'sprachkenntnisse',
        'interessen',
        'studiengang',
        'datum_start',
        'datum_end',
        'fachsemester',
        'schulart',
        'active'
    ];

    public function likedBy (User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function ownedBy (User $user)
    {
        return $user->id === $this->user_id;
    }

    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function requests()
    {
        return $this->morphMany(Request::class, 'requestable');
    }
    
}
