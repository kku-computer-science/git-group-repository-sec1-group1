<?php

namespace App\Http\Controllers;

use App\Models\ResearchGroup;
use App\Models\Application; // สมมติว่ามี Model ชื่อ Application ที่เกี่ยวข้องกับกลุ่มวิจัย
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResearchgroupsController extends Controller
{
    public function index()
    {
        // วิธีที่ 1: ใช้ withCount และเงื่อนไข
        $resg = ResearchGroup::with('user')
            ->withCount(['applications' => function ($query) {
                $query->where('app_deadline', '>=', now()); // ตรวจสอบว่ามีการเปิดรับสมัครที่ยังไม่หมดเวลา
            }])
            ->orderBy('group_name_en')
            ->get();
        
        // วิธีที่ 2: ใช้ join กับตาราง applications เพื่อดึงข้อมูลการเปิดรับสมัคร
        // $resg = ResearchGroup::with('user')
        //     ->leftJoin('applications', 'research_groups.id', '=', 'applications.research_group_id')
        //     ->select('research_groups.*', DB::raw('COUNT(CASE WHEN applications.app_deadline >= NOW() THEN 1 END) as active_applications_count'))
        //     ->groupBy('research_groups.id')
        //     ->orderBy('group_name_en')
        //     ->get();
        
        return view('research_g', compact('resg'));
    }
}