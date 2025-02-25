<?php

namespace App\Http\Controllers;
use App\Models\ResearchGroup;
use Illuminate\Http\Request;
use App\Models\ProjectApplication;

class ResearchgroupsController extends Controller
{
    public function index()
    {
        $resg = ResearchGroup::with('User')->orderBy('group_name_en')->get();
        $projectApplications = ProjectApplication::where('project_title')->get();
        return view('research_g',compact('resg','projectApplications'));
    }
}
