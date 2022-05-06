@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assignment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assignments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.id') }}
                        </th>
                        <td>
                            {{ $assignment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.student_efk') }}
                        </th>
                        <td>
                            {{ $assignment->student_efk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.coach_efk') }}
                        </th>
                        <td>
                            {{ $assignment->coach_efk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.title') }}
                        </th>
                        <td>
                            {{ $assignment->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.instructions') }}
                        </th>
                        <td>
                            {!! $assignment->instructions !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.start_at') }}
                        </th>
                        <td>
                            {{ $assignment->start_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.lesson_time_efk') }}
                        </th>
                        <td>
                            {{ $assignment->lesson_time_efk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.deadline') }}
                        </th>
                        <td>
                            {{ $assignment->deadline }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignment.fields.time_given') }}
                        </th>
                        <td>
                            {{ $assignment->time_given }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assignments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#assignment_submissions" role="tab" data-toggle="tab">
                {{ trans('cruds.submission.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="assignment_submissions">
            @includeIf('admin.assignments.relationships.assignmentSubmissions', ['submissions' => $assignment->assignmentSubmissions])
        </div>
    </div>
</div>

@endsection