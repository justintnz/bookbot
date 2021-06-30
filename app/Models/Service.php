<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;



class Service extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'image', 'description'];
    use HasTranslations;
    
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
        return url('/admin/services/' . $this->getKey());
    }
}
