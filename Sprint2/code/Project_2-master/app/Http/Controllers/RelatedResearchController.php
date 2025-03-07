<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\RelatedResearch;
use App\Models\User;
use DB;


class RelatedResearchController extends Controller
{
    public function index()
    {
        $researchers = RelatedResearch::all();
        $relatedResearch = RelatedResearch::all();
        
        return back()->with('success', 'Related research created successfully.');

    }

    public function create()
    {
        return view('relatedresearch.create');
    }

public function store(Request $request, $id){
    $request->validate([
        're_title' => 'required',
        're_desc' => 'required',
        'public_date' => 'required',
        'source_url' => 'required',
        're_type' => 'required',
        'user_ids' => 'required|array', // ตรวจสอบว่า user_ids เป็นอาเรย์
        'user_ids.*' => 'exists:users,id', // ตรวจสอบให้แน่ใจว่าทุก ID เป็น ID ที่มีอยู่ใน users
        're_group_id' => 'required|exists:research_groups,id',
        'and_author' => 'nullable|boolean',
    ]);

    // เริ่ม Transaction
    DB::beginTransaction();

    try {
        // สร้างงานวิจัยที่เกี่ยวข้องใหม่
        $relatedResearch = new RelatedResearch();
        $relatedResearch->re_title = $request->re_title;
        $relatedResearch->re_desc = $request->re_desc;
        $relatedResearch->public_date = $request->public_date;
        $relatedResearch->source_url = $request->source_url;
        $relatedResearch->re_type = $request->re_type;
        $relatedResearch->re_group_id = $request->re_group_id;
        $relatedResearch->and_author = $request->input('and_author', 0); // ถ้าไม่มีค่าจะเป็น 0
        $relatedResearch->save();

        // เชื่อมโยงผู้ใช้กับงานวิจัย
        if (is_array($request->user_ids)) {
            $userIds = array_filter($request->user_ids); // กรองค่าที่ไม่เป็น null
            $relatedResearch->users()->attach($userIds);
        }

        // Commit Transaction
        DB::commit();

        return redirect()->back()->with('success', 'Related research created successfully.');
    } catch (\Exception $e) {
        // Rollback Transaction หากเกิดข้อผิดพลาด
        DB::rollBack();
        return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการสร้างงานวิจัย: ' . $e->getMessage());
    }
}

public function destroy($researchGroupId, $relatedResearchId)
{
    $relatedResearch = RelatedResearch::findOrFail($relatedResearchId);

    $relatedResearch->users()->detach();

    $relatedResearch->delete();

    return redirect()->back()->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
}


}

