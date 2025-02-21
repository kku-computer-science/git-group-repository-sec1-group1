<?php

namespace App\Http\Controllers;
use App\Models\ResearchGroup;
use Illuminate\Http\Request;

class ApplicationProjectController extends Controller
{
    public function index($group_id)
    {
        $researchGroup = ResearchGroup::find($group_id);
    
        if (!$researchGroup) {
            return abort(404, 'Research Group not found');
        }
    
        return view('application_project.index', compact('researchGroup'));
    }

    public function create($group_id)
    {
        $researchGroup = ResearchGroup::find($group_id);
    
        if (!$researchGroup) {
            return abort(404, 'Research Group not found');
        }
    
        return view('application_project.create', compact('researchGroup'));
    }
}
