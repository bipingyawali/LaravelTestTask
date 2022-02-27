<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Imports\CandidateImport;
use App\Models\Candidate;
use Laracasts\Flash\Flash;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['candidates'] = Candidate::all();
        return view('candidate.index',$data);
    }

    /**
     * Import candidate's data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(CandidateRequest $request)
    {
        $file = $request->file('file')->store('import');

        $import = new CandidateImport();
        $import->import($file);
        Flash::success('Candidate import successfully.');
        return back();
    }
}
