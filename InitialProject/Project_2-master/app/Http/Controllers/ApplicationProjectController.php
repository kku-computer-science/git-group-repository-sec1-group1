<?php

namespace App\Http\Controllers;
use App\Models\ResearchGroup;
use Illuminate\Http\Request;
use App\Models\ProjectApplication;

class ApplicationProjectController extends Controller
{

    
    public function index($group_id)
    {
        $researchGroup = ResearchGroup::find($group_id);
    
        if (!$researchGroup) {
            return abort(404, 'Research Group not found');
        }
    
        $projects = ProjectApplication::where('re_group_id', $group_id)->get();

        return view('application_project.index', compact('researchGroup', 'projects'));
    }

    public function create($group_id)
    {
        $researchGroup = ResearchGroup::find($group_id);
    
        if (!$researchGroup) {
            return abort(404, 'Research Group not found');
        }
    
        return view('application_project.create', compact('researchGroup'));
    }

    public function store(Request $request, $group_id)
    {
        $researchGroup = ResearchGroup::find($group_id);
    
        if (!$researchGroup) {
            return abort(404, 'Research Group not found');
        }
    
        $request->validate([
            'project_title' => 'required',
            'project_details' => 'required',
            'contact' => 'required',
        ]);
    
        $researchGroup->projects()->create([
            'project_title' => $request->project_title,
            'project_details' => $request->project_details,
            'contact' => $request->contact,
            're_group_id' => $group_id,
        ]);
    
        return redirect()->route('application_project.index', $group_id);
    }
    
}
