<?php

namespace App\Http\Requests;

use App\Models\Attendence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAttendenceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('attendence_create');
    }

    public function rules()
    {
        return [
            'student_efk' => [
                'string',
                'required',
            ],
            'lesson_time_efk' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'attended_at' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'leave_at' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
