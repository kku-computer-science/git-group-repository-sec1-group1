<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedResearch extends Model
{
    use HasFactory;

    protected $table = 'related_research';

    protected $primaryKey = 'id';

    public $timestamps = false;


    // ระบุฟิลด์ที่สามารถ fill ได้
    protected $fillable = [
        're_title',
        're_desc',
        'public_date',
        'source_url',
        're_type',
        're_group_id',
        'and_author'

        
    ];

    // สร้างความสัมพันธ์กับ ResearchGroup
    public function researchGroup()
    {
        return $this->belongsTo(ResearchGroup::class, 'id');
    }

    // สร้างความสัมพันธ์กับ User
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'related_research_user', 'related_research_id', 'user_id');
    }

    
}