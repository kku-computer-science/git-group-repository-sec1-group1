<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectApplication extends Model
{
    use HasFactory;

    protected $table = 'project_application';

    protected $fillable = [
        'project_title',
        'project_details',
        'contact',
        're_group_id',
    ];

    public function researchGroup()
    {
        return $this->belongsTo(ResearchGroup::class, 're_group_id');
    }

    public function applications(): HasMany
{
    return $this->hasMany(Application::class, 'project_app_id');
}
}