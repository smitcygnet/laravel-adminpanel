<?php

namespace App\Http\Controllers\Backend\Tempone;

use App\Models\Tempone\Tempone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Tempone\CreateResponse;
use App\Http\Responses\Backend\Tempone\EditResponse;
use App\Repositories\Backend\Tempone\TemponeRepository;
use App\Http\Requests\Backend\Tempone\ManageTemponeRequest;
use App\Http\Requests\Backend\Tempone\CreateTemponeRequest;
use App\Http\Requests\Backend\Tempone\StoreTemponeRequest;
use App\Http\Requests\Backend\Tempone\EditTemponeRequest;
use App\Http\Requests\Backend\Tempone\UpdateTemponeRequest;
use App\Http\Requests\Backend\Tempone\DeleteTemponeRequest;

/**
 * TemponesController
 */
class TemponesController extends Controller
{
    /**
     * variable to store the repository object
     * @var TemponeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TemponeRepository $repository;
     */
    public function __construct(TemponeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Tempone\ManageTemponeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTemponeRequest $request)
    {
        return new ViewResponse('backend.tempones.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTemponeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Tempone\CreateResponse
     */
    public function create(CreateTemponeRequest $request)
    {
        return new CreateResponse('backend.tempones.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTemponeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTemponeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.tempones.index'), ['flash_success' => trans('alerts.backend.tempones.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Tempone\Tempone  $tempone
     * @param  EditTemponeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Tempone\EditResponse
     */
    public function edit(Tempone $tempone, EditTemponeRequest $request)
    {
        return new EditResponse($tempone);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTemponeRequestNamespace  $request
     * @param  App\Models\Tempone\Tempone  $tempone
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTemponeRequest $request, Tempone $tempone)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $tempone, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.tempones.index'), ['flash_success' => trans('alerts.backend.tempones.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTemponeRequestNamespace  $request
     * @param  App\Models\Tempone\Tempone  $tempone
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Tempone $tempone, DeleteTemponeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($tempone);
        //returning with successfull message
        return new RedirectResponse(route('admin.tempones.index'), ['flash_success' => trans('alerts.backend.tempones.deleted')]);
    }

}
