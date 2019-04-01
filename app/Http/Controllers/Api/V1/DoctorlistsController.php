<?php

namespace App\Http\Controllers\Api\V1;

use App\Doctorlist;
use App\Http\Controllers\Controller;
use App\Http\Resources\Doctorlist as DoctorlistResource;
use App\Http\Requests\Admin\StoreDoctorlistsRequest;
use App\Http\Requests\Admin\UpdateDoctorlistsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class DoctorlistsController extends Controller
{
    public function index()
    {
        

        return new DoctorlistResource(Doctorlist::with([])->get());
    }

    public function show($id)
    {
        if (Gate::denies('doctorlist_view')) {
            return abort(401);
        }

        $doctorlist = Doctorlist::with([])->findOrFail($id);

        return new DoctorlistResource($doctorlist);
    }

    public function store(StoreDoctorlistsRequest $request)
    {
        if (Gate::denies('doctorlist_create')) {
            return abort(401);
        }

        $doctorlist = Doctorlist::create($request->all());
        
        

        return (new DoctorlistResource($doctorlist))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateDoctorlistsRequest $request, $id)
    {
        if (Gate::denies('doctorlist_edit')) {
            return abort(401);
        }

        $doctorlist = Doctorlist::findOrFail($id);
        $doctorlist->update($request->all());
        
        
        

        return (new DoctorlistResource($doctorlist))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('doctorlist_delete')) {
            return abort(401);
        }

        $doctorlist = Doctorlist::findOrFail($id);
        $doctorlist->delete();

        return response(null, 204);
    }
}
