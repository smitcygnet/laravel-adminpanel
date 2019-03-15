<?php

namespace App\Http\Controllers\Backend\Samplethree;

use App\Models\Samplethree\Samplethree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Samplethree\CreateResponse;
use App\Http\Responses\Backend\Samplethree\EditResponse;
use App\Repositories\Backend\Samplethree\SamplethreeRepository;
use App\Http\Requests\Backend\Samplethree\ManageSamplethreeRequest;
use App\Http\Requests\Backend\Samplethree\CreateSamplethreeRequest;
use App\Http\Requests\Backend\Samplethree\StoreSamplethreeRequest;
use App\Http\Requests\Backend\Samplethree\EditSamplethreeRequest;
use App\Http\Requests\Backend\Samplethree\UpdateSamplethreeRequest;
use App\Http\Requests\Backend\Samplethree\DeleteSamplethreeRequest;

/**
 * SamplethreesController
 */
class SamplethreesController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplethreeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SamplethreeRepository $repository;
     */
    public function __construct(SamplethreeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Samplethree\ManageSamplethreeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSamplethreeRequest $request)
    {
        return new ViewResponse('backend.samplethrees.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSamplethreeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplethree\CreateResponse
     */
    public function create(CreateSamplethreeRequest $request)
    {
        return new CreateResponse('backend.samplethrees.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSamplethreeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSamplethreeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.samplethrees.index'), ['flash_success' => trans('alerts.backend.samplethrees.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Samplethree\Samplethree  $samplethree
     * @param  EditSamplethreeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplethree\EditResponse
     */
    public function edit(Samplethree $samplethree, EditSamplethreeRequest $request)
    {
        return new EditResponse($samplethree);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSamplethreeRequestNamespace  $request
     * @param  App\Models\Samplethree\Samplethree  $samplethree
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSamplethreeRequest $request, Samplethree $samplethree)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $samplethree, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.samplethrees.index'), ['flash_success' => trans('alerts.backend.samplethrees.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSamplethreeRequestNamespace  $request
     * @param  App\Models\Samplethree\Samplethree  $samplethree
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Samplethree $samplethree, DeleteSamplethreeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($samplethree);
        //returning with successfull message
        return new RedirectResponse(route('admin.samplethrees.index'), ['flash_success' => trans('alerts.backend.samplethrees.deleted')]);
    }
    
}
