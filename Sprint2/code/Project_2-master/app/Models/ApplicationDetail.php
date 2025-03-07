<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationDetail extends Model
{
    use HasFactory;

    protected $table = 'application_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'app_deadline',
        'role',
        'amount',
        'app_detail',
        'project_app_id',
        'qualifications',
        'preferred_qualifications',
        'required_documents',
        'salary_range',
        'working_time',
        'work_location',
        'start_date',
        'end_date',
        'application_process'
    ];

    public function projectApplication()
    {
        return $this->belongsTo(ProjectApplication::class, 'project_app_id');
    }
}

