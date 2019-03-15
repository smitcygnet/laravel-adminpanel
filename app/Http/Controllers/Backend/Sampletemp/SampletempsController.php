<?php

namespace App\Http\Controllers\Backend\Sampletemp;

use App\Models\Sampletemp\Sampletemp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Sampletemp\CreateResponse;
use App\Http\Responses\Backend\Sampletemp\EditResponse;
use App\Repositories\Backend\Sampletemp\SampletempRepository;
use App\Http\Requests\Backend\Sampletemp\ManageSampletempRequest;
use App\Http\Requests\Backend\Sampletemp\CreateSampletempRequest;
use App\Http\Requests\Backend\Sampletemp\StoreSampletempRequest;
use App\Http\Requests\Backend\Sampletemp\EditSampletempRequest;
use App\Http\Requests\Backend\Sampletemp\UpdateSampletempRequest;
use App\Http\Requests\Backend\Sampletemp\DeleteSampletempRequest;

/**
 * SampletempsController
 */
class SampletempsController extends Controller
{
    /**
     * variable to store the repository object
     * @var SampletempRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SampletempRepository $repository;
     */
    public function __construct(SampletempRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Sampletemp\ManageSampletempRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSampletempRequest $request)
    {
        return new ViewResponse('backend.sampletemps.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSampletempRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sampletemp\CreateResponse
     */
    public function create(CreateSampletempRequest $request)
    {
        return new CreateResponse('backend.sampletemps.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSampletempRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSampletempRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.sampletemps.index'), ['flash_success' => trans('alerts.backend.sampletemps.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Sampletemp\Sampletemp  $sampletemp
     * @param  EditSampletempRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sampletemp\EditResponse
     */
    public function edit(Sampletemp $sampletemp, EditSampletempRequest $request)
    {
        return new EditResponse($sampletemp);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSampletempRequestNamespace  $request
     * @param  App\Models\Sampletemp\Sampletemp  $sampletemp
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSampletempRequest $request, Sampletemp $sampletemp)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $sampletemp, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.sampletemps.index'), ['flash_success' => trans('alerts.backend.sampletemps.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSampletempRequestNamespace  $request
     * @param  App\Models\Sampletemp\Sampletemp  $sampletemp
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Sampletemp $sampletemp, DeleteSampletempRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($sampletemp);
        //returning with successfull message
        return new RedirectResponse(route('admin.sampletemps.index'), ['flash_success' => trans('alerts.backend.sampletemps.deleted')]);
    }
    
}
