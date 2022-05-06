<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubmissionRequest;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('submission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Submission::with(['assignment', 'created_by'])->select(sprintf('%s.*', (new Submission())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'submission_show';
                $editGate = 'submission_edit';
                $deleteGate = 'submission_delete';
                $crudRoutePart = 'submissions';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('assignment_title', function ($row) {
                return $row->assignment ? $row->assignment->title : '';
            });

            $table->editColumn('assignment.student_efk', function ($row) {
                return $row->assignment ? (is_string($row->assignment) ? $row->assignment : $row->assignment->student_efk) : '';
            });
            $table->editColumn('assignment.deadline', function ($row) {
                return $row->assignment ? (is_string($row->assignment) ? $row->assignment : $row->assignment->deadline) : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Submission::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('student_efk', function ($row) {
                return $row->student_efk ? $row->student_efk : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'assignment']);

            return $table->make(true);
        }

        $assignments = Assignment::get();
        $users       = User::get();

        return view('admin.submissions.index', compact('assignments', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('submission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignments = Assignment::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.submissions.create', compact('assignments'));
    }

    public function store(StoreSubmissionRequest $request)
    {
        $submission = Submission::create($request->all());

        return redirect()->route('admin.submissions.index');
    }

    public function edit(Submission $submission)
    {
        abort_if(Gate::denies('submission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assignments = Assignment::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $submission->load('assignment', 'created_by');

        return view('admin.submissions.edit', compact('assignments', 'submission'));
    }

    public function update(UpdateSubmissionRequest $request, Submission $submission)
    {
        $submission->update($request->all());

        return redirect()->route('admin.submissions.index');
    }

    public function show(Submission $submission)
    {
        abort_if(Gate::denies('submission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submission->load('assignment', 'created_by');

        return view('admin.submissions.show', compact('submission'));
    }

    public function destroy(Submission $submission)
    {
        abort_if(Gate::denies('submission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $submission->delete();

        return back();
    }

    public function massDestroy(MassDestroySubmissionRequest $request)
    {
        Submission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
