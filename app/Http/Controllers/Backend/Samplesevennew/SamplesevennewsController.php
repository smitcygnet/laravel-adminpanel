<?php

namespace App\Http\Controllers\Backend\Samplesevennew;

use App\Models\Samplesevennew\Samplesevennew;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Samplesevennew\CreateResponse;
use App\Http\Responses\Backend\Samplesevennew\EditResponse;
use App\Repositories\Backend\Samplesevennew\SamplesevennewRepository;
use App\Http\Requests\Backend\Samplesevennew\ManageSamplesevennewRequest;
use App\Http\Requests\Backend\Samplesevennew\CreateSamplesevennewRequest;
use App\Http\Requests\Backend\Samplesevennew\StoreSamplesevennewRequest;
use App\Http\Requests\Backend\Samplesevennew\EditSamplesevennewRequest;
use App\Http\Requests\Backend\Samplesevennew\UpdateSamplesevennewRequest;
use App\Http\Requests\Backend\Samplesevennew\DeleteSamplesevennewRequest;

/**
 * SamplesevennewsController
 */
class SamplesevennewsController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplesevennewRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SamplesevennewRepository $repository;
     */
    public function __construct(SamplesevennewRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Samplesevennew\ManageSamplesevennewRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSamplesevennewRequest $request)
    {
        return new ViewResponse('backend.samplesevennews.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSamplesevennewRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplesevennew\CreateResponse
     */
    public function create(CreateSamplesevennewRequest $request)
    {
        return new CreateResponse('backend.samplesevennews.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSamplesevennewRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSamplesevennewRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.samplesevennews.index'), ['flash_success' => trans('alerts.backend.samplesevennews.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Samplesevennew\Samplesevennew  $samplesevennew
     * @param  EditSamplesevennewRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplesevennew\EditResponse
     */
    public function edit(Samplesevennew $samplesevennew, EditSamplesevennewRequest $request)
    {
        return new EditResponse($samplesevennew);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSamplesevennewRequestNamespace  $request
     * @param  App\Models\Samplesevennew\Samplesevennew  $samplesevennew
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSamplesevennewRequest $request, Samplesevennew $samplesevennew)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $samplesevennew, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.samplesevennews.index'), ['flash_success' => trans('alerts.backend.samplesevennews.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSamplesevennewRequestNamespace  $request
     * @param  App\Models\Samplesevennew\Samplesevennew  $samplesevennew
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Samplesevennew $samplesevennew, DeleteSamplesevennewRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($samplesevennew);
        //returning with successfull message
        return new RedirectResponse(route('admin.samplesevennews.index'), ['flash_success' => trans('alerts.backend.samplesevennews.deleted')]);
    }
    
}
