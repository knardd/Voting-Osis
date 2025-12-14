<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'name',
        'class',
        'vision',
        'mission',
    ];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
