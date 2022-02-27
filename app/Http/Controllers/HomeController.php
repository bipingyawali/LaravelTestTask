<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['candidates'] = Candidate::all();
        return view('home',$data);
    }
}
