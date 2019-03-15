<?php

namespace App\Http\Controllers\Backend\Samplefour;

use App\Models\Samplefour\Samplefour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Samplefour\CreateResponse;
use App\Http\Responses\Backend\Samplefour\EditResponse;
use App\Repositories\Backend\Samplefour\SamplefourRepository;
use App\Http\Requests\Backend\Samplefour\ManageSamplefourRequest;
use App\Http\Requests\Backend\Samplefour\CreateSamplefourRequest;
use App\Http\Requests\Backend\Samplefour\StoreSamplefourRequest;
use App\Http\Requests\Backend\Samplefour\EditSamplefourRequest;
use App\Http\Requests\Backend\Samplefour\UpdateSamplefourRequest;
use App\Http\Requests\Backend\Samplefour\DeleteSamplefourRequest;

/**
 * SamplefoursController
 */
class SamplefoursController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplefourRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SamplefourRepository $repository;
     */
    public function __construct(SamplefourRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Samplefour\ManageSamplefourRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSamplefourRequest $request)
    {
        return new ViewResponse('backend.samplefours.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSamplefourRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplefour\CreateResponse
     */
    public function create(CreateSamplefourRequest $request)
    {
        return new CreateResponse('backend.samplefours.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSamplefourRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSamplefourRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.samplefours.index'), ['flash_success' => trans('alerts.backend.samplefours.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Samplefour\Samplefour  $samplefour
     * @param  EditSamplefourRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplefour\EditResponse
     */
    public function edit(Samplefour $samplefour, EditSamplefourRequest $request)
    {
        return new EditResponse($samplefour);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSamplefourRequestNamespace  $request
     * @param  App\Models\Samplefour\Samplefour  $samplefour
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSamplefourRequest $request, Samplefour $samplefour)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $samplefour, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.samplefours.index'), ['flash_success' => trans('alerts.backend.samplefours.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSamplefourRequestNamespace  $request
     * @param  App\Models\Samplefour\Samplefour  $samplefour
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Samplefour $samplefour, DeleteSamplefourRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($samplefour);
        //returning with successfull message
        return new RedirectResponse(route('admin.samplefours.index'), ['flash_success' => trans('alerts.backend.samplefours.deleted')]);
    }
    
}
