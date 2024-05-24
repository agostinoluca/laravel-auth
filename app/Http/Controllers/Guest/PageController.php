<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class PageController extends Controller
{
    public function index()
    {
        $latest_projects = Project::orderByDesc('id')->take(4)->get();
        return view('welcome', compact('latest_projects'));
    }
}
