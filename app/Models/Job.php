<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_title',
        'company_name',
        'start_date',
        'end_date',
        'candidate_id'
    ];

    /**
     * Get the candidate who owns the job.
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
