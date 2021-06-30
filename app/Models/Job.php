<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Job extends Model
{
use HasTranslations;
    protected $fillable = [
        'booking_id',
        'charge',
        'customer_id',
        'data',
        'end_at',
        'location_id',
        'service_id',
        'staff_id',
        'start_at',
        'status',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'end_at',
        'start_at',
        'updated_at',
    
    ];
    // these attributes are translatable
    public $translatable = [
        'data',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/jobs/'.$this->getKey());
    }
}
