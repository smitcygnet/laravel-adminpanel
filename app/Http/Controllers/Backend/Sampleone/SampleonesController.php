<?php

namespace App\Http\Controllers\Backend\Sampleone;

use App\Models\Sampleone\Sampleone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Sampleone\CreateResponse;
use App\Http\Responses\Backend\Sampleone\EditResponse;
use App\Repositories\Backend\Sampleone\SampleoneRepository;
use App\Http\Requests\Backend\Sampleone\ManageSampleoneRequest;
use App\Http\Requests\Backend\Sampleone\CreateSampleoneRequest;
use App\Http\Requests\Backend\Sampleone\StoreSampleoneRequest;
use App\Http\Requests\Backend\Sampleone\EditSampleoneRequest;
use App\Http\Requests\Backend\Sampleone\UpdateSampleoneRequest;
use App\Http\Requests\Backend\Sampleone\DeleteSampleoneRequest;

/**
 * SampleonesController
 */
class SampleonesController extends Controller
{
    /**
     * variable to store the repository object
     * @var SampleoneRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SampleoneRepository $repository;
     */
    public function __construct(SampleoneRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Sampleone\ManageSampleoneRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSampleoneRequest $request)
    {
        return new ViewResponse('backend.sampleones.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSampleoneRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sampleone\CreateResponse
     */
    public function create(CreateSampleoneRequest $request)
    {
        return new CreateResponse('backend.sampleones.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSampleoneRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSampleoneRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.sampleones.index'), ['flash_success' => trans('alerts.backend.sampleones.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Sampleone\Sampleone  $sampleone
     * @param  EditSampleoneRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sampleone\EditResponse
     */
    public function edit(Sampleone $sampleone, EditSampleoneRequest $request)
    {
        return new EditResponse($sampleone);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSampleoneRequestNamespace  $request
     * @param  App\Models\Sampleone\Sampleone  $sampleone
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSampleoneRequest $request, Sampleone $sampleone)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $sampleone, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.sampleones.index'), ['flash_success' => trans('alerts.backend.sampleones.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSampleoneRequestNamespace  $request
     * @param  App\Models\Sampleone\Sampleone  $sampleone
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Sampleone $sampleone, DeleteSampleoneRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($sampleone);
        //returning with successfull message
        return new RedirectResponse(route('admin.sampleones.index'), ['flash_success' => trans('alerts.backend.sampleones.deleted')]);
    }
    
}
