<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $table = 'proposal';

    protected $fillable = [
        'stage_id',        // Renamed from Stage_id for consistency; adjust migration if needed
        'tasks',
        'motivation',
        'status',          // Indicates approved/denied status
        'feedback',
        'coordinator_id',  // The coordinator who reviews the proposal
    ];

    // A proposal is linked to one student (the student that filled it out).
    public function student()
    {
        return $this->hasOne(Student::class, 'proposal_id');
    }

    // A proposal is reviewed by a coordinator.
    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class, 'coordinator_id');
    }

    // A proposal is associated with one stage (internship).
    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }
}
