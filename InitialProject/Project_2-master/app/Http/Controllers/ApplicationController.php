<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ProjectApplication;

class ApplicationController extends Controller
{
    public function create($project_id)
    {
        $project = ProjectApplication::findOrFail($project_id);
        return view('application.create', compact('project'));
    }

    public function store(Request $request, $projectId)
    {
        $validatedData = $request->validate([
            'role.*'          => 'required|string',
            'app_deadline.*'  => 'required|date',
            'amount.*'        => 'required|numeric',
            'app_detail.*'    => 'required|string',
            'app_condition.*' => 'required|string',
        ]);
    
        $applications = [];
        foreach ($request->role as $index => $role) {
            $applications[] = [
                'project_app_id' => $projectId,
                'role'           => $role,
                'app_deadline'   => $request->app_deadline[$index],
                'amount'         => $request->amount[$index],
                'app_detail'     => $request->app_detail[$index],
                'app_condition'  => $request->app_condition[$index],
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }
        \App\Models\Application::insert($applications);
        
    
        return redirect()->route('application_project.show', $projectId)->with('success', 'Applications submitted successfully!');
    }
    
    

    public function show($id)
{
    $application = Application::findOrFail($id);
    return view('application.show', compact('application'));
}



    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return response()->json([
            'success' => true,
            'message' => 'Application deleted successfully.'
        ]);
    }
}
