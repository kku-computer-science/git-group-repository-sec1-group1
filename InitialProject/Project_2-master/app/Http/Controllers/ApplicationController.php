<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ResearchGroup;

class ApplicationController extends Controller
{
    /**
     * Display applications for a research group
     */

     public function index($group_id)
     {
         $researchGroup = ResearchGroup::find($group_id);
     
         if (!$researchGroup) {
             return abort(404, 'Research Group not found');
         }
     
         $applications = Application::where('research_group_id', $group_id)->get();
 
         return view('application.index', compact('researchGroup', 'applications'));
     }

    public function show($id)
    {
        $researchGroup = ResearchGroup::findOrFail($id);
    
        // Get all applications for this research group
        $application = Application::where('research_group_id', $id)
            ->orderBy('created_at', 'desc')     
            ->get();

        return view('application.index', compact('researchGroup', 'application'));
    }

    /**
     * Show the form for creating a new application
     */
    public function create($group_id)
    {
        $researchGroup = ResearchGroup::findOrFail($group_id);
        return view('application.create', compact('researchGroup'));
    }

    /**
     * Show application details
     */
    public function detail($id)
    {
        // Make sure we're getting the application by its primary key
        $application = Application::findOrFail($id);
        
        // Ensure the research group exists
        $researchGroup = ResearchGroup::findOrFail($application->research_group_id);

        // Pass both variables to the view
        return view('application.detail', compact('application', 'researchGroup'));
    }
    
    /**
     * Legacy method for backward compatibility
     */
    public function usershow($id)
    {
        // Make sure we're getting the application by its primary key
        $application = Application::findOrFail($id);
        
        // Ensure the research group exists
        $researchGroup = ResearchGroup::findOrFail($application->research_group_id);

        return view('applicationdetail', compact('application', 'researchGroup'));
    }

    /**
     * Store a newly created application
     */
    public function store(Request $request, $group_id)
    {
        $validatedData = $request->validate([
            'role'                     => 'required|string',
            'app_deadline'             => 'required|date',
            'amount'                   => 'required|numeric',
            'app_detail'               => 'required|string',
            'qualifications'           => 'nullable|string',
            'preferred_qualifications' => 'nullable|string',
            'required_documents'       => 'required|string',
            'salary_range'             => 'required|string',
            'working_time'             => 'required|string',
            'work_location'            => 'required|string',
            'start_date'               => 'required|date',
            'end_date'                 => 'nullable|date',
            'application_process'      => 'required|string',
            'contact_name'             => 'nullable|string',
            'contact_email'            => 'nullable|email',
            'contact_phone'            => 'nullable|string',
            'custom_fields_config'     => 'nullable|json',
        ]);

        // Add research_group_id to the data
        $validatedData['research_group_id'] = $group_id;

        // Handle the structured salary fields if present
        if ($request->has('salary_amount') && $request->has('salary_period')) {
            $validatedData['salary_amount'] = $request->salary_amount;
            $validatedData['salary_period'] = $request->salary_period;
        }

        // Handle the structured working time fields if present
        if ($request->has('working_type') && $request->has('working_hours') && $request->has('working_period')) {
            $validatedData['working_type'] = $request->working_type;
            $validatedData['working_hours'] = $request->working_hours;
            $validatedData['working_period'] = $request->working_period;
        }

        // Create the application
        $application = Application::create($validatedData);

        return redirect()->route('application.index', $group_id)
            ->with('success', 'Application created successfully!');
    }

    /**
     * Show the form for editing an application
     */
    public function edit($id)
    {
        $application = Application::findOrFail($id);
        $researchGroup = ResearchGroup::findOrFail($application->research_group_id);

        return view('application.edit', compact('application', 'researchGroup'));
    }

    /**
     * Update the specified application
     */
    public function update(Request $request, $id)
    {
        // Find the application
        $application = Application::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'app_deadline'             => 'required|date',
            'role'                     => 'required|string',
            'amount'                   => 'required|integer|min:1',
            'app_detail'               => 'required|string',
            'qualifications'           => 'nullable|string',
            'preferred_qualifications' => 'nullable|string',
            'required_documents'       => 'nullable|string',
            'salary_range'             => 'required|string',
            'working_time'             => 'required|string',
            'work_location'            => 'required|string',
            'start_date'               => 'required|date',
            'end_date'                 => 'nullable|date',
            'application_process'      => 'required|string',
            'contact_name'             => 'nullable|string',
            'contact_email'            => 'nullable|email',
            'contact_phone'            => 'nullable|string',
            'custom_fields_config'     => 'nullable|json',
        ]);

        // Handle the structured salary fields if present
        if ($request->has('salary_amount') && $request->has('salary_period')) {
            $validatedData['salary_amount'] = $request->salary_amount;
            $validatedData['salary_period'] = $request->salary_period;
        }

        // Handle the structured working time fields if present
        if ($request->has('working_type') && $request->has('working_hours') && $request->has('working_period')) {
            $validatedData['working_type'] = $request->working_type;
            $validatedData['working_hours'] = $request->working_hours;
            $validatedData['working_period'] = $request->working_period;
        }

        // Update the application with validated data
        $application->update($validatedData);

        // Redirect with success message
        return redirect()->route('application.detail', $application->id)
            ->with('success', 'Application updated successfully!');
    }

    /**
     * Remove the specified application
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $group_id = $application->research_group_id;
        $application->delete();

        return redirect()->route('application.show', $group_id)
            ->with('success', 'Application deleted successfully!');
    }
}