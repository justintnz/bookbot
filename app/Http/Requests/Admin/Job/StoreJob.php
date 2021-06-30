<?php

namespace App\Http\Requests\Admin\Job;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreJob extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.job.create');
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'booking_id' => ['nullable', 'string'],
            'charge' => ['required', 'numeric'],
            'customer_id' => ['required', 'string'],
            'end_at' => ['nullable', 'date'],
            'location_id' => ['required', 'string'],
            'service_id' => ['required', 'string'],
            'staff_id' => ['required', 'string'],
            'start_at' => ['required', 'date'],
            'status' => ['required', 'string'],
            
        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'data' => ['required', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
