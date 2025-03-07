<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ResearchGroup;
use App\Models\ApplicationCustomField;
use App\Models\ApplicationCustomFieldValue;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{

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
        // Fetch the application
        $application = Application::findOrFail($id);

        // Fetch the research group
        $researchGroup = ResearchGroup::findOrFail($application->research_group_id);

        // Fetch custom fields and their values
        $applicationCustomFields = ApplicationCustomField::where('application_id', $id)->get();
        $customFieldValues = ApplicationCustomFieldValue::where('application_id', $id)
            ->pluck('field_value', 'custom_field_id')
            ->toArray();

        return view('application.show', compact(
            'application',
            'researchGroup',
            'applicationCustomFields',
            'customFieldValues'
        ));
    }
    

    public function create($group_id)
    {
        $researchGroup = ResearchGroup::findOrFail($group_id);
        return view('application.create', compact('researchGroup'));
    }


    public function detail($id)
    {
        $application = Application::findOrFail($id);

        $researchGroup = ResearchGroup::findOrFail($application->research_group_id);

        return view('application.index', compact('application', 'researchGroup'));
    }


    public function usershow($id)
    {
        $application = Application::findOrFail($id);
        $researchGroup = ResearchGroup::findOrFail($application->research_group_id);
        
        // เพิ่มการโหลด custom fields
        $applicationCustomFields = ApplicationCustomField::where('application_id', $id)->get();
        $customFieldValues = ApplicationCustomFieldValue::where('application_id', $id)
            ->pluck('field_value', 'custom_field_id')
            ->toArray();
    
        return view('applicationdetail', compact(
            'application',
            'researchGroup',
            'applicationCustomFields',
            'customFieldValues'
        ));
    }

    public function store(Request $request, $group_id)
    {
        DB::beginTransaction();
    
        try {
            $validatedData = $request->validate([
                'role'                     => 'required|string',
                'app_deadline'             => 'required|date',
                'amount'                   => 'required|numeric',
                'app_detail'               => 'required|string',
                'qualifications'           => 'nullable|string',
                'preferred_qualifications' => 'nullable|string',
                'required_documents'       => 'required|string',
                'salary_amount'            => 'required|string',
                'salary_period'            => 'required|string',
                'work_location'            => 'required|string',
                'start_date'               => 'required|date',
                'end_date'                 => 'nullable|date',
                'application_process'      => 'required|string',
                'contact_name'             => 'nullable|string',
                'contact_email'            => 'nullable|email',
                'contact_phone'            => 'nullable|string',
                'custom_fields_config'     => 'nullable|json',
            ]);
    
            $validatedData['research_group_id'] = $group_id;
    
            $validatedData['salary_range_old'] = $request->salary_amount . ' ' . $request->salary_period;
    
            $application = Application::create($validatedData);
    

            \Log::info('Creating application', [
                'id' => $application->id, 
                'salary_amount' => $validatedData['salary_amount'],
                'salary_period' => $validatedData['salary_period'],
                'salary_range_old' => $validatedData['salary_range_old']
            ]);

            $application->salary_amount = $validatedData['salary_amount'];
            $application->salary_period = $validatedData['salary_period'];
            $application->salary_range_old = $validatedData['salary_range_old'];
            $application->save(); 
    

            if ($request->has('custom_fields_config') && !empty($request->custom_fields_config)) {
                $customFields = json_decode($request->custom_fields_config, true);
    
                if (is_array($customFields)) {
                    foreach ($customFields as $field) {
                        $customField = new ApplicationCustomField();
                        $customField->application_id = $application->id;
                        $customField->field_label = $field['label'];
                        $customField->field_type = $field['type'];
                        $customField->field_required = $field['required'] ? 1 : 0;
                        $customField->field_placeholder = $field['placeholder'] ?? null;
                        $customField->save();
    
                        $fieldName = 'custom_' . $field['id'];
                        if ($request->has($fieldName)) {
                            $fieldValue = new ApplicationCustomFieldValue();
                            $fieldValue->application_id = $application->id;
                            $fieldValue->custom_field_id = $customField->id;
                            $fieldValue->field_value = $request->$fieldName;
                            $fieldValue->save();
                        }
                    }
                }
            }
    
            DB::commit();
    
            return redirect()->route('application.index', $group_id)
                ->with('success', 'Application created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
    
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create application. ' . $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $application = Application::findOrFail($id);
        $researchGroup = ResearchGroup::findOrFail($application->research_group_id);

        $existingCustomFields = ApplicationCustomField::where('application_id', $id)->get();
        $existingCustomFieldValues = ApplicationCustomFieldValue::where('application_id', $id)->get();

        $customFieldValues = $existingCustomFieldValues->pluck('field_value', 'custom_field_id')->toArray();

        return view('application.edit', compact(
            'application',
            'researchGroup',
            'existingCustomFields',
            'existingCustomFieldValues',
            'customFieldValues'
        ));
    }
    

    public function update(Request $request, $id)
    {
        $application = Application::findOrFail($id);
    
        $validatedData = $request->validate([
            'app_deadline'             => 'required|date',
            'role'                     => 'required|string',
            'amount'                   => 'required|integer|min:1',
            'app_detail'               => 'required|string',
            'qualifications'           => 'nullable|string',
            'preferred_qualifications' => 'nullable|string',
            'required_documents'       => 'nullable|string',
            'salary_amount'            => 'required|string',
            'salary_period'            => 'required|string',
            'work_location'            => 'required|string',
            'start_date'               => 'required|date',
            'end_date'                 => 'nullable|date',
            'application_process'      => 'required|string',
            'contact_name'             => 'nullable|string',
            'contact_email'            => 'nullable|email',
            'contact_phone'            => 'nullable|string',
            'custom_fields_config'     => 'nullable|json',
        ]);

        $validatedData['salary_range_old'] = $request->salary_amount . ' ' . $request->salary_period;
    
        DB::beginTransaction();
    
        try {
            \Log::info('Updating application', [
                'id' => $id,
                'salary_amount' => $validatedData['salary_amount'],
                'salary_period' => $validatedData['salary_period'],
                'salary_range_old' => $validatedData['salary_range_old']
            ]);

            $application->salary_amount = $validatedData['salary_amount'];
            $application->salary_period = $validatedData['salary_period'];
            $application->salary_range_old = $validatedData['salary_range_old'];
            
            $application->update($validatedData);

            if ($request->has('custom_fields_config') && !empty($request->custom_fields_config)) {
                $customFields = json_decode($request->custom_fields_config, true);
    
                if (is_array($customFields)) {
                    foreach ($customFields as $field) {
                        $customField = ApplicationCustomField::updateOrCreate(
                            [
                                'application_id' => $application->id,
                                'id' => $field['id'] ?? null, 
                            ],
                            [
                                'field_label' => $field['field_label'],
                                'field_type' => $field['field_type'],
                                'field_required' => $field['field_required'],
                                'field_placeholder' => $field['field_placeholder'] ?? null,
                            ]
                        );
    

                        $fieldName = 'custom_' . $field['id'];
                        if ($request->has($fieldName)) {

                            ApplicationCustomFieldValue::updateOrCreate(
                                [
                                    'application_id' => $application->id,
                                    'custom_field_id' => $customField->id,
                                ],
                                [
                                    'field_value' => $request->$fieldName,
                                ]
                            );
                        }
                    }
                }
            }
    
            $application->save();
    
            DB::commit();

            return redirect()->route('application.show', $application->id)
                ->with('success', 'Application updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
    
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Failed to update application. ' . $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        $group_id = $application->research_group_id;
        $application->delete();

        return redirect()->route('application.index', $group_id)
            ->with('success', 'Application deleted successfully!');
    }
}