<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendenceRequest;
use App\Http\Requests\UpdateAttendenceRequest;
use App\Http\Resources\Admin\AttendenceResource;
use App\Models\Attendence;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AttendenceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('attendence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AttendenceResource(Attendence::with(['created_by'])->get());
    }

    public function store(StoreAttendenceRequest $request)
    {
        $attendence = Attendence::create($request->all());

        return (new AttendenceResource($attendence))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Attendence $attendence)
    {
        abort_if(Gate::denies('attendence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AttendenceResource($attendence->load(['created_by']));
    }

    public function update(UpdateAttendenceRequest $request, Attendence $attendence)
    {
        $attendence->update($request->all());

        return (new AttendenceResource($attendence))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Attendence $attendence)
    {
        abort_if(Gate::denies('attendence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attendence->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
