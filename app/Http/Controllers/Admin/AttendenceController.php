<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAttendenceRequest;
use App\Http\Requests\StoreAttendenceRequest;
use App\Http\Requests\UpdateAttendenceRequest;
use App\Models\Attendence;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AttendenceController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('attendence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Attendence::with(['created_by'])->select(sprintf('%s.*', (new Attendence())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'attendence_show';
                $editGate = 'attendence_edit';
                $deleteGate = 'attendence_delete';
                $crudRoutePart = 'attendences';

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
            $table->editColumn('student_efk', function ($row) {
                return $row->student_efk ? $row->student_efk : '';
            });
            $table->editColumn('lesson_time_efk', function ($row) {
                return $row->lesson_time_efk ? $row->lesson_time_efk : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        $users = User::get();

        return view('admin.attendences.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('attendence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.attendences.create');
    }

    public function store(StoreAttendenceRequest $request)
    {
        $attendence = Attendence::create($request->all());

        return redirect()->route('admin.attendences.index');
    }

    public function edit(Attendence $attendence)
    {
        abort_if(Gate::denies('attendence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendence->load('created_by');

        return view('admin.attendences.edit', compact('attendence'));
    }

    public function update(UpdateAttendenceRequest $request, Attendence $attendence)
    {
        $attendence->update($request->all());

        return redirect()->route('admin.attendences.index');
    }

    public function show(Attendence $attendence)
    {
        abort_if(Gate::denies('attendence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendence->load('created_by');

        return view('admin.attendences.show', compact('attendence'));
    }

    public function destroy(Attendence $attendence)
    {
        abort_if(Gate::denies('attendence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendence->delete();

        return back();
    }

    public function massDestroy(MassDestroyAttendenceRequest $request)
    {
        Attendence::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
