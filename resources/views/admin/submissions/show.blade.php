@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.submission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.submissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.submission.fields.id') }}
                        </th>
                        <td>
                            {{ $submission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.submission.fields.assignment') }}
                        </th>
                        <td>
                            {{ $submission->assignment->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.submission.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Submission::STATUS_SELECT[$submission->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.submission.fields.student_efk') }}
                        </th>
                        <td>
                            {{ $submission->student_efk }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.submissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection