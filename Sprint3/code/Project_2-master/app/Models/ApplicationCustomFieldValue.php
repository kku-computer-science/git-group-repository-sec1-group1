<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ApplicationCustomFieldValue extends Model
{
    use HasFactory;
    
    protected $table = 'application_custom_field_values';
    
    protected $fillable = [
        'application_id',
        'custom_field_id',
        'field_value',
    ];
    
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
    
    public function customField()
    {
        return $this->belongsTo(ApplicationCustomField::class, 'custom_field_id');
    }
}