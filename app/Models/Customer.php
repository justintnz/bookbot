<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Brackets\Translatable\Traits\HasTranslations;

class Customer extends Model
{
    use HasFactory;
    public function getName(): string
    {
        return $this->name;
    }

    use HasTranslations;
    protected $fillable = [
        'data',
        'email',
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
        return url('/admin/customers/' . $this->getKey());
    }
}
