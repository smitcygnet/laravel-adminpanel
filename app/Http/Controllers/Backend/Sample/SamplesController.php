<?php

namespace App\Http\Controllers\Backend\Sample;

use App\Models\Sample\Sample;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Sample\CreateResponse;
use App\Http\Responses\Backend\Sample\EditResponse;
use App\Repositories\Backend\Sample\SampleRepository;
use App\Http\Requests\Backend\Sample\ManageSampleRequest;
use App\Http\Requests\Backend\Sample\CreateSampleRequest;
use App\Http\Requests\Backend\Sample\StoreSampleRequest;
use App\Http\Requests\Backend\Sample\EditSampleRequest;
use App\Http\Requests\Backend\Sample\UpdateSampleRequest;
use App\Http\Requests\Backend\Sample\DeleteSampleRequest;

/**
 * SamplesController
 */
class SamplesController extends Controller
{
    /**
     * variable to store the repository object
     * @var SampleRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SampleRepository $repository;
     */
    public function __construct(SampleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Sample\ManageSampleRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSampleRequest $request)
    {
        return new ViewResponse('backend.samples.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSampleRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sample\CreateResponse
     */
    public function create(CreateSampleRequest $request)
    {
        return new CreateResponse('backend.samples.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSampleRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSampleRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.samples.index'), ['flash_success' => trans('alerts.backend.samples.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Sample\Sample  $sample
     * @param  EditSampleRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sample\EditResponse
     */
    public function edit(Sample $sample, EditSampleRequest $request)
    {
        return new EditResponse($sample);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSampleRequestNamespace  $request
     * @param  App\Models\Sample\Sample  $sample
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSampleRequest $request, Sample $sample)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $sample, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.samples.index'), ['flash_success' => trans('alerts.backend.samples.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSampleRequestNamespace  $request
     * @param  App\Models\Sample\Sample  $sample
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Sample $sample, DeleteSampleRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($sample);
        //returning with successfull message
        return new RedirectResponse(route('admin.samples.index'), ['flash_success' => trans('alerts.backend.samples.deleted')]);
    }
    
}
