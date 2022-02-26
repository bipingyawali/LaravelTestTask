<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('candidate.index');
    }

    /**
     * Import data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(CandidateRequest $request)
    {

    }
}
