<?php

namespace App\Http\Controllers;

use App\Models\ProjectApplication;
use App\Models\ResearchGroup;
use Illuminate\Http\Request;

class ProjectApplicationController extends Controller
{
    public function showResearchGroupDetail($id)
    {
        $researchGroup = ResearchGroup::findOrFail($id);
        $projectApplications = ProjectApplication::where('re_group_id', $id)->get();

        return view('researchgroupdetail', compact('researchGroup', 'projectApplications'));
    }
}
