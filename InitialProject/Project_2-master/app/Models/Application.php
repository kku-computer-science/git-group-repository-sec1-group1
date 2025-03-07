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
    protected $primaryKey = 'id';

    protected $fillable = [
        'research_group_id',
        'app_deadline',
        'role',
        'amount',
        'app_detail',
        'app_condition',
        'qualifications',
        'preferred_qualifications',
        'required_documents',
        'salary_range_old',
        'salary_range_amount',
        'salary_preriod',
        'working_time_old',
        'working_type',
        'working_hours',
        'working_period',
        'work_location',
        'start_date',
        'end_date',
        'application_process',
        'contact_name',
        'contact_email',
        'contact_phone',
    ];

    public function researchGroup()
    {
        return $this->belongsTo(ResearchGroup::class, 'research_group_id');
    }
    


    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'research_group_id');
    }
}
