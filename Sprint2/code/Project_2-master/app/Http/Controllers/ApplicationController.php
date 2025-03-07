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

    public function edit($application_id)
    {
        $application = Application::findOrFail($application_id);
        $project = ProjectApplication::find($application->project_app_id); // Use correct foreign key

        return view('application.edit', compact('application', 'project'));
    }



    public function store(Request $request, $projectId)
    {
        $validatedData = $request->validate([
            'role.*'                   => 'required|string',
            'app_deadline.*'           => 'required|date',
            'amount.*'                 => 'required|numeric',
            'app_detail.*'             => 'required|string',
            'qualifications.*'         => 'nullable|string',
            'preferred_qualifications.*' => 'nullable|string',
            'required_documents.*'     => 'required|string',
            'salary_range.*'           => 'required|string',
            'working_time.*'           => 'required|string',
            'work_location.*'          => 'required|string',
            'start_date.*'             => 'required|date',
            'end_date.*'               => 'nullable|date',
            'application_process.*'    => 'required|string',
        ]);

        $applications = [];
        foreach ($request->role ?? [] as $index => $role) {
            $applications[] = [
                'project_app_id'         => $projectId,
                'role'                   => $role,
                'app_deadline'           => $request->app_deadline[$index] ?? null,
                'amount'                 => $request->amount[$index] ?? 0,
                'app_detail'             => $request->app_detail[$index] ?? '',
                'qualifications'         => $request->qualifications[$index] ?? null,
                'preferred_qualifications' => $request->preferred_qualifications[$index] ?? null,
                'required_documents'     => $request->required_documents[$index] ?? '',
                'salary_range'           => $request->salary_range[$index] ?? '',
                'working_time'           => $request->working_time[$index] ?? '',
                'work_location'          => $request->work_location[$index] ?? '',
                'start_date'             => $request->start_date[$index] ?? null,
                'end_date'               => $request->end_date[$index] ?? null,
                'application_process'    => $request->application_process[$index] ?? '',
                'created_at'             => now(),
                'updated_at'             => now(),
            ];
        }

        Application::insert($applications);

        return redirect()->route('application_project.show', $projectId)
            ->with('success', 'Applications submitted successfully!');
    }




    public function show($application_id)
    {
        $application = Application::findOrFail($application_id);
        $project = ProjectApplication::find($application->project_app_id); // Use correct foreign key

        return view('application.show', compact('application', 'project'));
    }
    public function usershow($application_id)
    {
        $application = Application::findOrFail($application_id);
        $project = ProjectApplication::find($application->project_app_id); // Use correct foreign key

        return view('applicationdetail', compact('application', 'project'));
    }

    public function update(Request $request, $id)
{
    // Find the application
    $application = Application::findOrFail($id);

    // Validate the request data
    $validatedData = $request->validate([
        'app_deadline' => 'required|date',
        'role' => 'required|string',
        'amount' => 'required|integer|min:1',
        'app_detail' => 'required|string',
        'qualifications' => 'nullable|string',
        'preferred_qualifications' => 'nullable|string',
        'required_documents' => 'nullable|string',
        'salary_range' => 'required|string',
        'working_time' => 'required|string',
        'work_location' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date',
        'application_process' => 'required|string',
    ]);

    // Update the application with validated data
    $application->update($validatedData);

    // Redirect with success message
    return redirect()->route('application.show', $id)->with('success', 'Application updated successfully!');
}
    






    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        $project = ProjectApplication::find($application->project_app_id);

        return redirect()->route('application_project.show', $project)
            ->with('success', 'Application deleted successfully!');
    }
}
