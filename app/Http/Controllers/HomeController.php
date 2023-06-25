<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Load the home page with all candidate.
     * @return View
     */
    public function index(): View
    {
        $data['candidates'] = Candidate::all();
        return view('home',$data);
    }
}
