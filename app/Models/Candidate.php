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
        'first_name',
        'last_name',
        'email'
    ];

    /**
     * Get the full name of the candidate.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return preg_replace('/\s+/', ' ', $this->first_name . ' ' . $this->last_name);
    }

    /**
     * Get the jobs for the candidate.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class)->orderBy('start_date','desc');
    }
}
