<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Paper;
use App\Models\ResearchGroup;
use App\Models\ProjectApplication;
use Illuminate\Http\Request;

class ResearchGroupDetailController extends Controller
{
    public function request($id)
    {
        $resgd = ResearchGroup::with(['user.paper' => function ($query) {
            return $query->orderBy('paper_yearpub', 'DESC');
        }])->where('id', $id)->get();
        $projectApplications = ProjectApplication::where('re_group_id', $id)->get();

        return view('researchgroupdetail', compact('resgd', 'projectApplications'));
    }
}
