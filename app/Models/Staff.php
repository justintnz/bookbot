<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Staff extends Model
{
use HasTranslations;
    protected $fillable = [
        'data',
        'name',
        'phone',
        'status',
    
    ];
    
    
    protected $dates = [
        'created_at',
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
        return url('/admin/staff/'.$this->getKey());
    }
}
