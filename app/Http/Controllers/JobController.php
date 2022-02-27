<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Imports\JobImport;
use App\Models\Job;
use Laracasts\Flash\Flash;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jobs'] = Job::all();
        return view('job.index',$data);
    }

    /**
     * import job's data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(JobRequest $request)
    {
        $file = $request->file('file')->store('import');

        $import = new JobImport();
        $import->import($file);
        Flash::success('Job import successfully.');
        return back();
    }
}
