@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.attendence.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.attendences.update", [$attendence->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="student_efk">{{ trans('cruds.attendence.fields.student_efk') }}</label>
                <input class="form-control {{ $errors->has('student_efk') ? 'is-invalid' : '' }}" type="text" name="student_efk" id="student_efk" value="{{ old('student_efk', $attendence->student_efk) }}" required>
                @if($errors->has('student_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendence.fields.student_efk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lesson_time_efk">{{ trans('cruds.attendence.fields.lesson_time_efk') }}</label>
                <input class="form-control {{ $errors->has('lesson_time_efk') ? 'is-invalid' : '' }}" type="number" name="lesson_time_efk" id="lesson_time_efk" value="{{ old('lesson_time_efk', $attendence->lesson_time_efk) }}" step="1" required>
                @if($errors->has('lesson_time_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lesson_time_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendence.fields.lesson_time_efk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="attended_at">{{ trans('cruds.attendence.fields.attended_at') }}</label>
                <input class="form-control datetime {{ $errors->has('attended_at') ? 'is-invalid' : '' }}" type="text" name="attended_at" id="attended_at" value="{{ old('attended_at', $attendence->attended_at) }}" required>
                @if($errors->has('attended_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attended_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendence.fields.attended_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="leave_at">{{ trans('cruds.attendence.fields.leave_at') }}</label>
                <input class="form-control datetime {{ $errors->has('leave_at') ? 'is-invalid' : '' }}" type="text" name="leave_at" id="leave_at" value="{{ old('leave_at', $attendence->leave_at) }}" required>
                @if($errors->has('leave_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leave_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendence.fields.leave_at_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection