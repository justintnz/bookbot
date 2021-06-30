<?php

namespace App\Http\Requests\Admin\Job;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateJob extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.job.edit', $this->job);
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'booking_id' => ['nullable', 'string'],
            'charge' => ['sometimes', 'numeric'],
            'customer_id' => ['sometimes', 'string'],
            'end_at' => ['nullable', 'date'],
            'location_id' => ['sometimes', 'string'],
            'service_id' => ['sometimes', 'string'],
            'staff_id' => ['sometimes', 'string'],
            'start_at' => ['sometimes', 'date'],
            'status' => ['sometimes', 'string'],
            

        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'data' => ['sometimes', 'string'],
            
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
