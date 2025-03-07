<?php

namespace App\Http\Controllers;
use App\Models\ResearchGroup;
use Illuminate\Http\Request;
use App\Models\ProjectApplication;

class ResearchgroupsController extends Controller
{
    public function index()
    {
        $resg = ResearchGroup::with('user', 'projectApplications')
        ->orderBy('group_name_en')
        ->get();

        return view('research_g', compact('resg'));
    }   
}
