<?php

namespace App\Http\Controllers;

use App\Models\ApplicationDetail;
use App\Models\ProjectApplication;
use Illuminate\Http\Request;

class ApplicationDetailController extends Controller
{
    public function show($id)
    {
        $applicationDetail = ProjectApplication::findOrFail($id);
        return view('applicationdetail', compact('applicationDetail'));
    }

}
