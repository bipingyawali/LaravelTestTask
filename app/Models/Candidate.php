<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email'
    ];

    /**
     * Get the jobs for the candidate.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
