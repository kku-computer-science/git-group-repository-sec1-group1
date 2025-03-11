<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\ResearchGroup;
use App\Models\RelatedResearch;
use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;


class ResearchGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:groups-list|groups-create|groups-edit|groups-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:groups-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:groups-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:groups-delete', ['only' => ['destroy']]);
    }

    public function projects()
    {
        return $this->hasMany(Application::class, 'research_group_id ');
    }

    public function index()
    {
        //$researchGroups = ResearchGroup::latest()->paginate(5);
        $researchGroups = ResearchGroup::with('User')->get();


        return view('research_groups.index', compact('researchGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::role(['teacher', 'student'])->get();
        $funds = Fund::get();
        return view('research_groups.create', compact('users', 'funds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_desc_en' => 'required',
            'group_detail_en' => 'required',
            'head' => 'required',
        ]);

        // Translate English input to Thai and Chinese
        $tr_th = new GoogleTranslate('th');
        $tr_zh = new GoogleTranslate('zh');

        $input = $request->all();
        $input['group_desc_th'] = $tr_th->translate($request->group_desc_en);
        $input['group_detail_th'] = $tr_th->translate($request->group_detail_en);
        $input['group_desc_cn'] = $tr_zh->translate($request->group_desc_en);
        $input['group_detail_cn'] = $tr_zh->translate($request->group_detail_en);

        // Handle image upload
        if ($request->group_image) {
            $input['group_image'] = time() . '.' . $request->group_image->extension();
            $request->group_image->move(public_path('img'), $input['group_image']);
        }

        $researchGroup = ResearchGroup::create($input);
        $head = $request->head;
        $researchGroup->user()->attach($head, ['role' => 1]);

        if ($request->moreFields) {
            foreach ($request->moreFields as $key => $value) {
                if (!empty($value['userid'])) {
                    $researchGroup->user()->attach($value, ['role' => 2]);
                }
            }
        }

        return redirect()->route('researchGroups.index')->with('success', 'Research group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fund  $researchGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ResearchGroup $researchGroup)
    {
        #$researchGroup=ResearchGroup::find($researchGroup->id);
        //dd($researchGroup->id);
        //$data=ResearchGroup::find($researchGroup->id)->get(); 

        //return $data;
        // $relatedResearch = $researchGroup->relatedResearch;
        $relatedResearch = RelatedResearch::with('User') 
        ->where('re_group_id', $researchGroup->id)
        ->get();
        $users = User::role(['teacher', 'student'])->get();
        return view('research_groups.show', compact('researchGroup','relatedResearch', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fund  $researchGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ResearchGroup $researchGroup)
    {
        $researchGroup = ResearchGroup::find($researchGroup->id);
        $this->authorize('update', $researchGroup);
        $researchGroup = ResearchGroup::with(['user'])->where('id', $researchGroup->id)->first();
        $users = User::get();
        //return $users;
        return view('research_groups.edit', compact('researchGroup', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResearchGroup  $researchGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchGroup $researchGroup)
    {
        $request->validate([
            'group_desc_en' => 'required',
            'group_detail_en' => 'required',
        ]);

        // Translate English input to Thai and Chinese
        $tr_th = new GoogleTranslate('th');
        $tr_zh = new GoogleTranslate('zh');

        $input = $request->all();
        $input['group_desc_th'] = $tr_th->translate($request->group_desc_en);
        $input['group_detail_th'] = $tr_th->translate($request->group_detail_en);
        $input['group_desc_cn'] = $tr_zh->translate($request->group_desc_en);
        $input['group_detail_cn'] = $tr_zh->translate($request->group_detail_en);

        // Handle image upload
        if ($request->group_image) {
            $input['group_image'] = time() . '.' . $request->group_image->extension();
            $request->group_image->move(public_path('img'), $input['group_image']);
        }

        $researchGroup->update($input);
        $researchGroup->user()->detach();
        $researchGroup->user()->attach([$request->head => ['role' => 1]]);

        if ($request->moreFields) {
            foreach ($request->moreFields as $key => $value) {
                if (!empty($value['userid'])) {
                    $researchGroup->user()->attach($value, ['role' => 2]);
                }
            }
        }

        return redirect()->route('researchGroups.index')->with('success', 'Research group updated successfully.');
    }
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fund  $researchGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchGroup $researchGroup)
    {
        $this->authorize('delete', $researchGroup);
        $researchGroup->delete();
        return redirect()->route('researchGroups.index')
            ->with('success', 'researchGroups deleted successfully');
    }
}
