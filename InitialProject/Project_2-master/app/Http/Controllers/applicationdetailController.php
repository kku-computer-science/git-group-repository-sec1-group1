<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\applicationdetail;
use App\Models\projectapplication;
use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Models\ResearchGroup;

class applicationdetailController extends Controller
{
    
    public function index()
    {
        $app_detail = ApplicationDetail::all(); // ดึงข้อมูลจาก application_detail
        $proj_app = ProjectApplication::all(); // ดึงข้อมูลจาก project_application

        return view('applicationdetail', compact('app_detail', 'proj_app'));
    }

}
