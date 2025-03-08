<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ApplicationCustomField extends Model
{
    use HasFactory;
    
    protected $table = 'application_custom_fields';
    
    protected $fillable = [
        'application_id',
        'field_label',
        'field_type',
        'field_required',
        'field_placeholder',
    ];
    
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
    
    public function fieldValues()
    {
        return $this->hasMany(ApplicationCustomFieldValue::class, 'custom_field_id');
    }
}