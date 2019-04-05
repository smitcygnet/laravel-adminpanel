<?php

namespace App\Http\Controllers\Backend\Sampletwo;

use App\Models\Sampletwo\Sampletwo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Sampletwo\CreateResponse;
use App\Http\Responses\Backend\Sampletwo\EditResponse;
use App\Repositories\Backend\Sampletwo\SampletwoRepository;
use App\Http\Requests\Backend\Sampletwo\ManageSampletwoRequest;
use App\Http\Requests\Backend\Sampletwo\CreateSampletwoRequest;
use App\Http\Requests\Backend\Sampletwo\StoreSampletwoRequest;
use App\Http\Requests\Backend\Sampletwo\EditSampletwoRequest;
use App\Http\Requests\Backend\Sampletwo\UpdateSampletwoRequest;
use App\Http\Requests\Backend\Sampletwo\DeleteSampletwoRequest;

/**
 * SampletwosController
 */
class SampletwosController extends Controller
{
    /**
     * variable to store the repository object
     * @var SampletwoRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SampletwoRepository $repository;
     */
    public function __construct(SampletwoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Sampletwo\ManageSampletwoRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSampletwoRequest $request)
    {
        return new ViewResponse('backend.sampletwos.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSampletwoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sampletwo\CreateResponse
     */
    public function create(CreateSampletwoRequest $request)
    {
        return new CreateResponse('backend.sampletwos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSampletwoRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSampletwoRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.sampletwos.index'), ['flash_success' => trans('alerts.backend.sampletwos.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Sampletwo\Sampletwo  $sampletwo
     * @param  EditSampletwoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Sampletwo\EditResponse
     */
    public function edit(Sampletwo $sampletwo, EditSampletwoRequest $request)
    {
        return new EditResponse($sampletwo);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSampletwoRequestNamespace  $request
     * @param  App\Models\Sampletwo\Sampletwo  $sampletwo
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSampletwoRequest $request, Sampletwo $sampletwo)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $sampletwo, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.sampletwos.index'), ['flash_success' => trans('alerts.backend.sampletwos.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSampletwoRequestNamespace  $request
     * @param  App\Models\Sampletwo\Sampletwo  $sampletwo
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Sampletwo $sampletwo, DeleteSampletwoRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($sampletwo);
        //returning with successfull message
        return new RedirectResponse(route('admin.sampletwos.index'), ['flash_success' => trans('alerts.backend.sampletwos.deleted')]);
    }

}
