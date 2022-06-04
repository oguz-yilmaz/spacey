<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalRequest extends FormRequest
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
            'job_post_id' => 'required|exists:job_posts,id',
            'provider_id' => 'sometimes|nullable|exists:providers,id'
        ];
    }
}
