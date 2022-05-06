@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assignment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assignments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="student_efk">{{ trans('cruds.assignment.fields.student_efk') }}</label>
                <input class="form-control {{ $errors->has('student_efk') ? 'is-invalid' : '' }}" type="number" name="student_efk" id="student_efk" value="{{ old('student_efk', '') }}" step="1" required>
                @if($errors->has('student_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.student_efk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="coach_efk">{{ trans('cruds.assignment.fields.coach_efk') }}</label>
                <input class="form-control {{ $errors->has('coach_efk') ? 'is-invalid' : '' }}" type="number" name="coach_efk" id="coach_efk" value="{{ old('coach_efk', '') }}" step="1" required>
                @if($errors->has('coach_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('coach_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.coach_efk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.assignment.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instructions">{{ trans('cruds.assignment.fields.instructions') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('instructions') ? 'is-invalid' : '' }}" name="instructions" id="instructions">{!! old('instructions') !!}</textarea>
                @if($errors->has('instructions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instructions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.instructions_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_at">{{ trans('cruds.assignment.fields.start_at') }}</label>
                <input class="form-control datetime {{ $errors->has('start_at') ? 'is-invalid' : '' }}" type="text" name="start_at" id="start_at" value="{{ old('start_at') }}" required>
                @if($errors->has('start_at'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_at') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.start_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lesson_time_efk">{{ trans('cruds.assignment.fields.lesson_time_efk') }}</label>
                <input class="form-control {{ $errors->has('lesson_time_efk') ? 'is-invalid' : '' }}" type="number" name="lesson_time_efk" id="lesson_time_efk" value="{{ old('lesson_time_efk', '') }}" step="1" required>
                @if($errors->has('lesson_time_efk'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lesson_time_efk') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.lesson_time_efk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deadline">{{ trans('cruds.assignment.fields.deadline') }}</label>
                <input class="form-control datetime {{ $errors->has('deadline') ? 'is-invalid' : '' }}" type="text" name="deadline" id="deadline" value="{{ old('deadline') }}">
                @if($errors->has('deadline'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deadline') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.deadline_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_given">{{ trans('cruds.assignment.fields.time_given') }}</label>
                <input class="form-control {{ $errors->has('time_given') ? 'is-invalid' : '' }}" type="number" name="time_given" id="time_given" value="{{ old('time_given', '') }}" step="1">
                @if($errors->has('time_given'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time_given') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignment.fields.time_given_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.assignments.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $assignment->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection