<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Paper;
use App\Models\User;
use App\Models\ResearchGroup;
use App\Models\RelatedResearch;
use App\Models\Application;
use Illuminate\Http\Request;

class ResearchGroupDetailController extends Controller
{
    public function request($id)
    {
        // Get research group with users and their papers
        $resgd = ResearchGroup::with(['user.paper' => function ($query) {
            $query->orderBy('paper_yearpub', 'DESC');
        }])->where('id', $id)->get();
        
        // Directly get applications related to this research group
        $applications = Application::where('research_group_id', $id)
            ->where(function($query) {
                $query->whereDate('app_deadline', '>=', now())
                    ->orWhereNull('app_deadline');
            })
            ->orderBy('app_deadline', 'asc')
            ->get();
        
        // Get related research with pagination
        $relatedResearch = RelatedResearch::with('users')
            ->where('re_group_id', $id)
            ->paginate(3);
        
        return view('researchgroupdetail', compact('resgd', 'relatedResearch', 'applications'));
    }
}