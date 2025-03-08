<?php

namespace App\Http\Controllers;
use App\Models\ResearchGroup;
use Illuminate\Http\Request;
use App\Models\ProjectApplication;
use App\Models\Application;

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

    public function show($id)
    {
        $project = ProjectApplication::with('applications')->find($id);
    
        if (!$project) {
            abort(404, 'Project not found');
        }
    
        return view('application_project.show', compact('project'));
    }
    


public function update(Request $request, $id)
{
    $project = ProjectApplication::find($id);

    if (!$project) {
        abort(404, 'Project not found');
    }

    $request->validate([
        'project_title' => 'required',
        'project_details' => 'required',
        'contact' => 'required',
    ]);

    $project->update($request->all());

    return redirect()->route('application_project.show', $project->id)->with('success', 'Project updated successfully.');
}

public function destroy($id)
{
    $projectApplication = ProjectApplication::findOrFail($id);

    // Delete related application records first
    Application::where('project_app_id', $projectApplication->id)->delete();

    // Now delete the project application
    $projectApplication->delete();

    return redirect()->route('application_project.index', $projectApplication->re_group_id)
        ->with('success', 'Project deleted successfully');
}

    
}