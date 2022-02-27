<?php

namespace App\Models;

use Carbon\Carbon;
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

    /**
     * Set the job's start date.
     *
     * @param  string  $value
     * @return void
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d.m.Y H:i', $value)->format('Y-m-d H:i');
    }

    /**
     * Set the job's end date.
     *
     * @param  string  $value
     * @return void
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('d.m.Y H:i', $value)->format('Y-m-d H:i');
    }

    /**
     * get the job's start date.
     *
     * @param  string  $value
     * @return string
     */
    public function getStartDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d.m.Y H:i');
    }

    /**
     * get the job's end date.
     *
     * @param  string  $value
     * @return string
     */
    public function getEndDateAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d.m.Y H:i');
    }
}
