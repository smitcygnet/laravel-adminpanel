<?php

namespace App\Http\Controllers\Backend\Sampleseven;

use App\Models\Sampleseven\Sampleseven;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Sampleseven\CreateResponse;
use App\Http\Responses\Backend\Sampleseven\EditResponse;
use App\Repositories\Backend\Sampleseven\SamplesevenRepository;
use App\Http\Requests\Backend\Sampleseven\ManageSamplesevenRequest;
use App\Http\Requests\Backend\Sampleseven\CreateSamplesevenRequest;
use App\Http\Requests\Backend\Sampleseven\StoreSamplesevenRequest;
use App\Http\Requests\Backend\Sampleseven\EditSamplesevenRequest;
use App\Http\Requests\Backend\Sampleseven\UpdateSamplesevenRequest;
use App\Http\Requests\Backend\Sampleseven\DeleteSamplesevenRequest;

/**
 * SamplesevensController
 */
class SamplesevensController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplesevenRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SamplesevenRepository $repository;
     */
    public function __construct(SamplesevenRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Sampleseven\ManageSamplesevenRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSamplesevenRequest $request)
    {
        return new ViewResponse('backend.samplesevens.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSamplesevenRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sampleseven\CreateResponse
     */
    public function create(CreateSamplesevenRequest $request)
    {
        return new CreateResponse('backend.samplesevens.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSamplesevenRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSamplesevenRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.samplesevens.index'), ['flash_success' => trans('alerts.backend.samplesevens.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Sampleseven\Sampleseven  $sampleseven
     * @param  EditSamplesevenRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sampleseven\EditResponse
     */
    public function edit(Sampleseven $sampleseven, EditSamplesevenRequest $request)
    {
        return new EditResponse($sampleseven);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSamplesevenRequestNamespace  $request
     * @param  App\Models\Sampleseven\Sampleseven  $sampleseven
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSamplesevenRequest $request, Sampleseven $sampleseven)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $sampleseven, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.samplesevens.index'), ['flash_success' => trans('alerts.backend.samplesevens.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSamplesevenRequestNamespace  $request
     * @param  App\Models\Sampleseven\Sampleseven  $sampleseven
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Sampleseven $sampleseven, DeleteSamplesevenRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($sampleseven);
        //returning with successfull message
        return new RedirectResponse(route('admin.samplesevens.index'), ['flash_success' => trans('alerts.backend.samplesevens.deleted')]);
    }
    
}
