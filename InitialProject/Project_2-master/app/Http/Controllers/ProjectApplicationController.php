<?php

namespace App\Http\Controllers;

use App\Models\ProjectApplication;
use Illuminate\Http\Request;

class ProjectApplicationController extends Controller
{
    public function index()
    {
        $applications = ProjectApplication::all();
        return view('project_applications.index', compact('applications'));
    }
}
