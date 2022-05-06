@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.submission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.submissions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="assignment_id">{{ trans('cruds.submission.fields.assignment') }}</label>
                <select class="form-control select2 {{ $errors->has('assignment') ? 'is-invalid' : '' }}" name="assignment_id" id="assignment_id">
                    @foreach($assignments as $id => $entry)
                        <option value="{{ $id }}" {{ old('assignment_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('assignment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('assignment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.submission.fields.assignment_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.submission.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Submission::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', 'IN_REVIEW') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.submission.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="student_efk">{{ trans('cruds.submission.fields.student_efk') }}</label>
                <input class="form-control {{ $errors->has('student_efk') ? 'is-invalid' : '' }}" type="number" name="student_efk" id="student_efk" value="{{ old('student_efk', '') }}" step="1">
                @if($errors->has('student_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.submission.fields.student_efk_helper') }}</span>
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