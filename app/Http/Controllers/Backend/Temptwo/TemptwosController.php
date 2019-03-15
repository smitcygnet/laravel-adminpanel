<?php

namespace App\Http\Controllers\Backend\Temptwo;

use App\Models\Temptwo\Temptwo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Temptwo\CreateResponse;
use App\Http\Responses\Backend\Temptwo\EditResponse;
use App\Repositories\Backend\Temptwo\TemptwoRepository;
use App\Http\Requests\Backend\Temptwo\ManageTemptwoRequest;
use App\Http\Requests\Backend\Temptwo\CreateTemptwoRequest;
use App\Http\Requests\Backend\Temptwo\StoreTemptwoRequest;
use App\Http\Requests\Backend\Temptwo\EditTemptwoRequest;
use App\Http\Requests\Backend\Temptwo\UpdateTemptwoRequest;
use App\Http\Requests\Backend\Temptwo\DeleteTemptwoRequest;

/**
 * TemptwosController
 */
class TemptwosController extends Controller
{
    /**
     * variable to store the repository object
     * @var TemptwoRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TemptwoRepository $repository;
     */
    public function __construct(TemptwoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Temptwo\ManageTemptwoRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTemptwoRequest $request)
    {
        return new ViewResponse('backend.temptwos.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTemptwoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Temptwo\CreateResponse
     */
    public function create(CreateTemptwoRequest $request)
    {
        return new CreateResponse('backend.temptwos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTemptwoRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTemptwoRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.temptwos.index'), ['flash_success' => trans('alerts.backend.temptwos.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Temptwo\Temptwo  $temptwo
     * @param  EditTemptwoRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Temptwo\EditResponse
     */
    public function edit(Temptwo $temptwo, EditTemptwoRequest $request)
    {
        return new EditResponse($temptwo);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTemptwoRequestNamespace  $request
     * @param  App\Models\Temptwo\Temptwo  $temptwo
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTemptwoRequest $request, Temptwo $temptwo)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $temptwo, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.temptwos.index'), ['flash_success' => trans('alerts.backend.temptwos.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTemptwoRequestNamespace  $request
     * @param  App\Models\Temptwo\Temptwo  $temptwo
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Temptwo $temptwo, DeleteTemptwoRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($temptwo);
        //returning with successfull message
        return new RedirectResponse(route('admin.temptwos.index'), ['flash_success' => trans('alerts.backend.temptwos.deleted')]);
    }
    
}
