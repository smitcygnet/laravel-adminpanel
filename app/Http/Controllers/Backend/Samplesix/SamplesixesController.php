<?php

namespace App\Http\Controllers\Backend\Samplesix;

use App\Models\Samplesix\Samplesix;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Samplesix\CreateResponse;
use App\Http\Responses\Backend\Samplesix\EditResponse;
use App\Repositories\Backend\Samplesix\SamplesixRepository;
use App\Http\Requests\Backend\Samplesix\ManageSamplesixRequest;
use App\Http\Requests\Backend\Samplesix\CreateSamplesixRequest;
use App\Http\Requests\Backend\Samplesix\StoreSamplesixRequest;
use App\Http\Requests\Backend\Samplesix\EditSamplesixRequest;
use App\Http\Requests\Backend\Samplesix\UpdateSamplesixRequest;
use App\Http\Requests\Backend\Samplesix\DeleteSamplesixRequest;

/**
 * SamplesixesController
 */
class SamplesixesController extends Controller
{
    /**
     * variable to store the repository object
     * @var SamplesixRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SamplesixRepository $repository;
     */
    public function __construct(SamplesixRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Samplesix\ManageSamplesixRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSamplesixRequest $request)
    {
        return new ViewResponse('backend.samplesixes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSamplesixRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplesix\CreateResponse
     */
    public function create(CreateSamplesixRequest $request)
    {
        return new CreateResponse('backend.samplesixes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSamplesixRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSamplesixRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.samplesixes.index'), ['flash_success' => trans('alerts.backend.samplesixes.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Samplesix\Samplesix  $samplesix
     * @param  EditSamplesixRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Samplesix\EditResponse
     */
    public function edit(Samplesix $samplesix, EditSamplesixRequest $request)
    {
        return new EditResponse($samplesix);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSamplesixRequestNamespace  $request
     * @param  App\Models\Samplesix\Samplesix  $samplesix
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSamplesixRequest $request, Samplesix $samplesix)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $samplesix, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.samplesixes.index'), ['flash_success' => trans('alerts.backend.samplesixes.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSamplesixRequestNamespace  $request
     * @param  App\Models\Samplesix\Samplesix  $samplesix
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Samplesix $samplesix, DeleteSamplesixRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($samplesix);
        //returning with successfull message
        return new RedirectResponse(route('admin.samplesixes.index'), ['flash_success' => trans('alerts.backend.samplesixes.deleted')]);
    }
    
}
