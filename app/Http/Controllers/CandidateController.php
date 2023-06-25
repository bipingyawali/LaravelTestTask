<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Imports\CandidateImport;
use App\Models\Candidate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Laracasts\Flash\Flash;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $data['candidates'] = Candidate::all();
        return view('candidate.index',$data);
    }

    /**
     * Import the candidate's data.
     * @param CandidateRequest $request
     * @return RedirectResponse
     */
    public function import(CandidateRequest $request): RedirectResponse
    {
        $file = $request->file('file')->store('import');

        $import = new CandidateImport();
        $import->import($file);
        Flash::success('Candidate import successfully.');
        return back();
    }
}
