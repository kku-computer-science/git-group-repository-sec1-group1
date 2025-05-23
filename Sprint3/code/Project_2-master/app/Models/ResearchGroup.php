<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_name_th', 'group_name_en', 'group_detail_th', 'group_detail_en', 'group_desc_th', 'group_desc_en', 'group_image','group_desc_cn', 'group_detail_cn',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class, 'research_group_id');
    }
    // public function researchGroup()
    // {
    //     return $this->hasMany(Application::class, 'research_group_id');
    // }

    public function user()
    {
        return $this->belongsToMany(User::class,'work_of_research_groups')->withPivot('role');
        // OR return $this->hasOne('App\Phone');
    }
    public function product(){
        return $this->hasOne(Product::class,'group_id');
    }
    public function relatedResearch()
    {
        return $this->hasMany(RelatedResearch::class, 're_group_id');
    }

    public function users() {
        return $this->belongsToMany(User::class)->withPivot('role');

    }
    
    public function projectApplications()
    {
        return $this->hasMany(ProjectApplication::class, 're_group_id');
    }

    public function applicationDetail()
    {
    return $this->hasOne(ApplicationDetail::class, 'application_id');
    }
}
