<?php

namespace App\Http\Controllers\Backend\Samplefive;

use App\Models\Samplefive\Samplefive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Samplefive\CreateResponse;
use App\Http\Responses\Backend\Samplefive\EditResponse;
use App\Repositories\Backend\Samplefive\SamplefiveRepository;
use App\Http\Requests\Backend\Samplefive\ManageSamplefiveRequest;
use App\Http\Requests\Backend\Samplefive\CreateSamplefiveRequest;
use App\Http\Requests\Backend\Samplefive\StoreSamplefiveRequest;
use App\Http\Requests\Backend\Samplefive\EditSamplefiveRequest;
use App\Http\Requests\Backend\Samplefive\UpdateSamplefiveRequest;
use App\Http\Requests\Backend\Samplefive\DeleteSamplefiveRequest;

/**
 * SamplefivesController
 */
class SamplefivesController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplefiveRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SamplefiveRepository $repository;
     */
    public function __construct(SamplefiveRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Samplefive\ManageSamplefiveRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSamplefiveRequest $request)
    {
        return new ViewResponse('backend.samplefives.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSamplefiveRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplefive\CreateResponse
     */
    public function create(CreateSamplefiveRequest $request)
    {
        return new CreateResponse('backend.samplefives.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSamplefiveRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSamplefiveRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.samplefives.index'), ['flash_success' => trans('alerts.backend.samplefives.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Samplefive\Samplefive  $samplefive
     * @param  EditSamplefiveRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplefive\EditResponse
     */
    public function edit(Samplefive $samplefive, EditSamplefiveRequest $request)
    {
        return new EditResponse($samplefive);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSamplefiveRequestNamespace  $request
     * @param  App\Models\Samplefive\Samplefive  $samplefive
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSamplefiveRequest $request, Samplefive $samplefive)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $samplefive, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.samplefives.index'), ['flash_success' => trans('alerts.backend.samplefives.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSamplefiveRequestNamespace  $request
     * @param  App\Models\Samplefive\Samplefive  $samplefive
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Samplefive $samplefive, DeleteSamplefiveRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($samplefive);
        //returning with successfull message
        return new RedirectResponse(route('admin.samplefives.index'), ['flash_success' => trans('alerts.backend.samplefives.deleted')]);
    }
    
}
