<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectApplication extends Model
{
    use HasFactory;
    protected $table = 'project_application';
    protected $primaryKey = 'id';
    protected $fillable = [
        'project_title',
        'contact',
        're_group_id',
    ];

    public function researchGroup()
    {
        return $this->belongsTo(ResearchGroup::class, 're_group_id');
    }
}