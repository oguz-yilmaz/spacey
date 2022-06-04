<?php

namespace App\Http\Requests;

use App\Models\JobPost;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'status' => Rule::in(JobPost::getStatuses()),
            'starts_at' => 'sometimes|required_with:ends_to|nullable|date|before_or_equal:ends_to',
            'ends_to' => 'sometimes|required_with:starts_at|nullable|date|after_or_equal:starts_at',
            'client_id' => 'sometimes|nullable|exists:clients,id',
            'provider_id' => 'sometimes|nullable|exists:providers,id'
        ];
    }
}
