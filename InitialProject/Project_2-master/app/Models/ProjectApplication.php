<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectApplication extends Model
{
    protected $fillable = [
        'project_title', 'contact', 're_group_id'
    ];

    protected $table = 'project_application';

    public function group()
    {
        return $this->belongsTo(Group::class, 're_group_id');
    }
}