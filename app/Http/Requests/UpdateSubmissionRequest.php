<?php

namespace App\Http\Requests;

use App\Models\Submission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSubmissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('submission_edit');
    }

    public function rules()
    {
        return [
            'student_efk' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
