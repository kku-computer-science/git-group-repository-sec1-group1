<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectApplication;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Application extends Model
{
    use HasFactory;

    protected $table = 'application_detail';

    protected $fillable = [
        'project_app_id',
        'app_deadline',
        'role',
        'amount',
        'app_detail',
        'app_condition',
        'qualifications',
        'preferred_qualifications',
        'required_documents',
        'salary_range',
        'working_time',
        'work_location',
        'start_date',
        'end_date',
        'application_process',
    ];
    

    public function project()
    {
        return $this->belongsTo(ProjectApplication::class, 'project_app_id');
    }


    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'project_app_id');
    }
}
