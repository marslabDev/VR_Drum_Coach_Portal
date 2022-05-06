@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.attendence.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.attendences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.attendence.fields.id') }}
                        </th>
                        <td>
                            {{ $attendence->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.attendence.fields.student_efk') }}
                        </th>
                        <td>
                            {{ $attendence->student_efk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.attendence.fields.lesson_time_efk') }}
                        </th>
                        <td>
                            {{ $attendence->lesson_time_efk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.attendence.fields.attended_at') }}
                        </th>
                        <td>
                            {{ $attendence->attended_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.attendence.fields.leave_at') }}
                        </th>
                        <td>
                            {{ $attendence->leave_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.attendences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection