<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Paper;
use App\Models\User;
use App\Models\ResearchGroup;
use App\Models\RelatedResearch;
use App\Models\ProjectApplication;
use Illuminate\Http\Request;

class ResearchGroupDetailController extends Controller
{
    public function request($id)
    {
        $resgd = ResearchGroup::with(['user.paper' => function ($query) {
            $query->orderBy('paper_yearpub', 'DESC');
        }])->where('id', $id)->get();
    
        // Eager load ProjectApplication with its ApplicationDetail and related Applications
        $projectApplications = ProjectApplication::with(['applicationDetail', 'applications']) 
            ->where('re_group_id', $id)
            ->get();
    
        $relatedResearch = RelatedResearch::with('user')
            ->where('re_group_id', $id)
            ->paginate(3);
    
        return view('researchgroupdetail', compact('resgd', 'relatedResearch', 'projectApplications'));
    }
    
}