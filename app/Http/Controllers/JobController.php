<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Imports\JobImport;
use App\Models\Job;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Laracasts\Flash\Flash;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $data['jobs'] = Job::all();
        return view('job.index',$data);
    }

    /**
     * Import job's data.
     * @param JobRequest $request
     * @return RedirectResponse
     */
    public function import(JobRequest $request): RedirectResponse
    {
        $file = $request->file('file')->store('import');

        $import = new JobImport();
        $import->import($file);
        Flash::success('Job import successfully.');
        return back();
    }
}
